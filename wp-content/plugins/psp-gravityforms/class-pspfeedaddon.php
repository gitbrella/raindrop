<?php

GFForms::include_feed_addon_framework();

class PspFeedAddOn extends GFFeedAddOn {

	protected $_version = PSP_GF;
	protected $_min_gravityforms_version = 'PSP_GF';
	protected $_slug = 'pspfeed';
	protected $_path = 'psp-gravityforms/psp-gravityforms.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Gravity Forms Project Panroama Feed';
	protected $_short_title = 'Project Panorama Feed';

	private static $_instance = null;

	/**
	 * Get an instance of this class.
	 *
	 * @return PspFeedAddOn
	 */
	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new PspFeedAddOn();
		}

		return self::$_instance;
	}

	/**
	 * Plugin starting point. Handles hooks, loading of language files and PayPal delayed payment support.
	 */
	public function init() {

		parent::init();

		$this->add_delayed_payment_support(
			array(
				'option_label' => esc_html__( 'Subscribe contact to service x only when payment is received.', 'psp_projects' )
			)
		);

	}


	// # FEED PROCESSING -----------------------------------------------------------------------------------------------

	/**
	 * Process the feed e.g. subscribe the user to a list.
	 *
	 * @param array $feed The feed object to be processed.
	 * @param array $entry The entry object currently being processed.
	 * @param array $form The form object currently being processed.
	 *
	 * @return bool|void
	 */
	public function process_feed( $feed, $entry, $form ) {

        $clone_id   = $feed['meta']['project_clone'];

        if( !$clone_id ) {
            return false;
        }

        // Retrieve the name => value pairs for all fields mapped in the 'mappedFields' field map.
		$field_map = $this->get_field_map_fields( $feed, 'mappedFields' );

		// Loop through the fields from the field map setting building an array of values to be passed to the third-party service.
		$merge_vars = array();
		foreach ( $field_map as $name => $field_id ) {

			// Get the field value for the specified field id
			$merge_vars[ $name ] = $this->get_field_value( $form, $entry, $field_id );

		}

        $post   = get_post( $clone_id );
        $new_id = psp_gf_create_duplicate( $post, 'publish' );

        if ( 0 !== $new_id ) {

			// If the user is logged in, assign them

			if( isset( $merge_vars['assign_user']) ) {

				if( is_int($merge_vars['assign_user']) ) {

					$user_id = $merge_vars['assign_user'];

					update_post_meta( $new_id, '_psp_assigned_users', array( $user_id ) );
					update_post_meta( $new_id, 'allowed_users_0_user', $user_id );
					update_post_meta( $new_id, 'allowed_users', 1 );

				} elseif( is_email($merge_vars['assign_user']) ) {

					$user = get_user_by( 'email', $merge_vars['assign_user'] );

					if( !$user && isset($feed['meta']['generate_account']) && $feed['meta']['generate_account'] == 'yes' ) {

						// Create an account for this user

						$account_level = apply_filters( 'psp_gf_default_account_level', 'subscriber' );
						$user_id 	   = wp_create_user( $merge_vars['assign_user'], false, $merge_vars['assign_user'] );

					} else {

						$user_id = $user->ID;

					}

					update_post_meta( $new_id, '_psp_assigned_users', array( $user_id ) );
					update_post_meta( $new_id, 'allowed_users_0_user', $user_id );
					update_post_meta( $new_id, 'allowed_users', 1 );

				}

			}

            update_post_meta( $clone_id, '_psp_cloned', 1 );

            update_field( 'restrict_access_to_specific_users', array( 'Yes' ), $new_id );

            $title = ( isset( $merge_vars['title'] ) ? $merge_vars['title'] : get_the_title( $new_id ) . ' - ' . $user->display_name );

            $new_project = array(
                'ID'          	=> $new_id,
                'post_status' 	=> 'publish',
                'post_title'	=> $title,
                'post_name'		=>	''
            );

            wp_update_post( $new_project );

            if( isset( $merge_vars['description'] ) ) {
                update_field( 'project_description', $merge_vars['description'], $new_id );
            }

            if( isset( $merge_vars['start_date'] ) ) {
                $start_date = date( 'Ymd', strtotime($merge_vars['start_date']) );
                update_field( 'start_date', $start_date, $new_id );
            }

            if( isset( $merge_vars['end_date'] ) ) {
                $end_date = date( 'Ymd', strtotime($merge_vars['end_date']) );
                update_field( 'end_date', $end_date, $new_id );
            }

            if( isset( $merge_vars['client'] ) ) {
                update_field( 'client', $merge_vars['client'], $new_id );
				update_post_meta( $new_id, 'client', $merge_vars['client'] );
            }

        }

		// Send the values to the third-party service.
	}


	/**
	 * Custom format the phone type field values before they are returned by $this->get_field_value().
	 *
	 * @param array $entry The Entry currently being processed.
	 * @param string $field_id The ID of the Field currently being processed.
	 * @param GF_Field_Phone $field The Field currently being processed.
	 *
	 * @return string
	 */
	public function get_phone_field_value( $entry, $field_id, $field ) {

		// Get the field value from the Entry Object.
		$field_value = rgar( $entry, $field_id );

		// If there is a value and the field phoneFormat setting is set to standard reformat the value.
		if ( ! empty( $field_value ) && $field->phoneFormat == 'standard' && preg_match( '/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/', $field_value, $matches ) ) {
			$field_value = sprintf( '%s-%s-%s', $matches[1], $matches[2], $matches[3] );
		}

		return $field_value;
	}

	// # SCRIPTS & STYLES -----------------------------------------------------------------------------------------------

	/**
	 * Return the scripts which should be enqueued.
	 *
	 * @return array
	 */
	public function scripts() {
		$scripts = array(
			array(
				'handle'  => 'my_script_js',
				'src'     => $this->get_base_url() . '/js/my_script.js',
				'version' => $this->_version,
				'deps'    => array( 'jquery' ),
				'strings' => array(
					'first'  => esc_html__( 'First Choice', 'psp_projects' ),
					'second' => esc_html__( 'Second Choice', 'psp_projects' ),
					'third'  => esc_html__( 'Third Choice', 'psp_projects' ),
				),
				'enqueue' => array(
					array(
						'admin_page' => array( 'form_settings' ),
						'tab'        => 'psp_projects',
					),
				),
			),
		);

		return array_merge( parent::scripts(), $scripts );
	}

	/**
	 * Return the stylesheets which should be enqueued.
	 *
	 * @return array
	 */
	public function styles() {

		$styles = array(
			array(
				'handle'  => 'my_styles_css',
				'src'     => $this->get_base_url() . '/css/my_styles.css',
				'version' => $this->_version,
				'enqueue' => array(
					array( 'field_types' => array( 'poll' ) ),
				),
			),
		);

		return array_merge( parent::styles(), $styles );
	}

	// # ADMIN FUNCTIONS -----------------------------------------------------------------------------------------------

	/**
	 * Creates a custom page for this add-on.
	 */
	public function plugin_page() {
		echo 'This page appears in the Forms menu';
	}

	/**
	 * Configures the settings which should be rendered on the add-on settings tab.
	 *
	 * @return array
	 */
	public function plugin_settings_fields() {
		return array(
			array(
				'title'  => esc_html__( 'Simple Add-On Settings', 'psp_projects' ),
				'fields' => array(
					array(
						'name'    => 'textbox',
						'tooltip' => esc_html__( 'This is the tooltip', 'psp_projects' ),
						'label'   => esc_html__( 'This is the label', 'psp_projects' ),
						'type'    => 'text',
						'class'   => 'small',
					),
				),
			),
		);
	}

	/**
	 * Configures the settings which should be rendered on the feed edit page in the Form Settings > Simple Feed Add-On area.
	 *
	 * @return array
	 */
	public function feed_settings_fields() {

        $args = array(
            'post_type'         =>  'psp_projects',
            'posts_per_page'    =>  -1,
            'post_status'       =>  'draft'
        );

        $projects = new WP_Query($args);

        $project_options = array();

        while( $projects->have_posts() ) {

            $projects->the_post();

            $project_options[] = array(
                'name'  =>  'project',
                'label' =>  get_the_title(),
                'value' =>  get_the_id()
            );

        }

		return array(
			array(
				'title'  => esc_html__( 'Simple Feed Settings', 'psp_projects' ),
				'fields' => array(
					array(
						'label'   => esc_html__( 'Feed name', 'psp_projects' ),
						'type'    => 'text',
						'name'    => 'feedName',
						'tooltip' => esc_html__( 'This is just for your reference', 'psp_projects' ),
						'class'   => 'small',
					),
					array(
						'label'   => esc_html__( 'Project to Clone', 'psp_projects' ),
						'type'    => 'select',
						'name'    => 'project_clone',
						'tooltip' => esc_html__( 'Select a project to clone upon completion', 'psp_projects' ),
						'class'   => 'small',
                        'choices'   =>  $project_options
					),
					array(
						'label'   => esc_html__( 'Create User Account if doesn\'t exist', 'psp_projects' ),
						'type'    => 'select',
						'name'    => 'generate_account',
						'tooltip' => esc_html__( 'Create an account for the user if one doesn\'t exist', 'psp_projects' ),
						'class'   => 'small',
						'choices'   =>  array(
							array(
								'name'	=>	'generate_account_yes',
								'label'	=>	__( 'Yes', 'psp_projects' ),
								'value'	=>  'yes',
							),
							array(
								'name'	=>	'generate_account_no',
								'label'	=>	__( 'No', 'psp_projects' ),
								'value'	=>  'no',
							)
						),
					),
                    array(
						'name'      => 'mappedFields',
						'label'     => esc_html__( 'Map Fields', 'psp_projects' ),
						'type'      => 'field_map',
						'field_map' => array(
							array(
								'name'     => 'title',
								'label'    => esc_html__( 'Project Title', 'psp_projects' ),
								'required' => 0,
							),
                            array(
                                'name'     => 'client',
                                'label'    => esc_html__( 'Client', 'psp_projects' ),
                                'required' => 0,
                            ),
                            array(
                                'name'     => 'description',
                                'label'    => esc_html__( 'Project Description', 'psp_projects' ),
                                'required' => 0,
                            ),
                            array(
                                'name'     => 'start_date',
                                'label'    => esc_html__( 'Start Date', 'psp_projects' ),
                                'tooltip' => esc_html__( 'Must be in yyyy/mm/dd format', 'psp_projects' ),
                                'required' => 0,
                            ),
                            array(
                                'name'     => 'end_date',
                                'label'    => esc_html__( 'End Date', 'psp_projects' ),
                                'tooltip' => esc_html__( 'Must be in yyyy/mm/dd format', 'psp_projects' ),
                                'required' => 0,
                            ),
							array(
								'name'	=>	'assign_user',
								'label'	=>	esc_html__( 'User to Assign', 'psp_projects' ),
								'tooltip'	=>	esc_html__( 'Can be a User ID or e-mail address', 'psp_projects' ),
								'required'	=>	0
							)
						),
					),
					array(
						'name'           => 'condition',
						'label'          => esc_html__( 'Condition', 'psp_projects' ),
						'type'           => 'feed_condition',
						'checkbox_label' => esc_html__( 'Enable Condition', 'psp_projects' ),
						'instructions'   => esc_html__( 'Process this simple feed if', 'psp_projects' ),
					),
				),
			),
		);
	}

	/**
	 * Configures which columns should be displayed on the feed list page.
	 *
	 * @return array
	 */
	public function feed_list_columns() {
		return array(
			'feedName'  => esc_html__( 'Name', 'psp_projects' ),
			'project_clone' => esc_html__( 'Project to Clone', 'psp_projects' ),
		);
	}

	/**
	 * Format the value to be displayed in the mytextbox column.
	 *
	 * @param array $feed The feed being included in the feed list.
	 *
	 * @return string
	 */
	public function get_column_value_mytextbox( $feed ) {
		return '<b>' . rgars( $feed, 'meta/mytextbox' ) . '</b>';
	}

	/**
	 * Prevent feeds being listed or created if an api key isn't valid.
	 *
	 * @return bool
	 */
	public function can_create_feed() {

		// Get the plugin settings.
		$settings = $this->get_plugin_settings();

		// Access a specific setting e.g. an api key
		$key = rgar( $settings, 'apiKey' );

		return true;
	}

}
