<?php
/**
 * Plugin Name: Project Panorama - Gravity Forms Integration
 * Plugin URI: http://www.projectpanorama.com
 * Description: Embed gravity forms in Panorama and clone projects with Gravity Forms
 * Version: 1.6.3
 * Author: SnapOrbital
 * Author URI: http://www.projectpanorama.com
 * License: GPL2
 * Text Domain: psp_projects
 */

do_action( 'psp_gf_before_init' );

$defintions = array(
    'PSP_GF'  =>  '1.6.3',
    'PSP_GF_PATH' =>  plugin_dir_path( __FILE__ ),
    'PSP_GF_URL'  =>  plugin_dir_url( __FILE__ )
);

foreach( $defintions as $definition => $value ) {

    if( !defined($definition) ) define( $definition, $value );

}

add_action( 'psp_head', 'psp_gf_add_assets' );
function psp_gf_add_assets() {

    $styles = array(
        array(
            'gforms_reset_css',
            plugins_url() . '/gravityforms/css/formreset.min.css',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'gforms_formsmain_css',
            plugins_url() . '/gravityforms/css/formsmain.min.css',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'gofrms_ready_class',
            plugins_url() . '/gravityforms/css/readyclass.min.css',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'gforms_browsers_css',
            plugins_url() . '/gravityforms/css/browsers.min.css',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'psp-gf-js',
            PSP_GF_URL . '/assets/css/gforms.css',
            null,
            PSP_GF,
            'all'
        )
    );

    $scripts = array(
        array(
            'jquery_json',
            plugins_url() . '/gravityforms/js/jquery.json.min.js',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'gravityforms',
            plugins_url() . '/gravityforms/js/gravityforms.min.js',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'conditional_logic',
            plugins_url() . '/gravityforms/js/conditional_logic.min.js',
            null,
            '2.1.2.12',
            'all'
        ),
        array(
            'psp-gf-js',
            PSP_GF_URL . '/assets/js/gforms.js',
            null,
            PSP_GF,
            'all'
        )
    );

    foreach( $scripts as $script ) {
        psp_enqueue_script( $script[0], $script[1], $script[2], $script[3], $script[4] );
    }

    foreach( $styles as $style ) {
        psp_enqueue_style( $style[0], $style[1], $style[2], $style[3], $style[4] );
    }

}

add_action( 'gform_loaded', array( 'GF_Pano_Feed_AddOn_Bootstrap', 'load' ), 5 );
class GF_Pano_Feed_AddOn_Bootstrap {
	public static function load() {
		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}
		require_once( 'class-pspfeedaddon.php' );
		GFAddOn::register( 'PspFeedAddOn' );
	}
}
function gf_psp_feed_addon() {
	return PspFeedAddOn::get_instance();
}

do_action( 'psp_gf_after_init' );

function psp_gf_create_duplicate( $post, $status = null , $new_post_author = null ) {

    require_once( PROJECT_PANORAMA_DIR . '/lib/vendor/clone/duplicate-post-admin.php' );

        // We don't want to clone revisions
    if ($post->post_type == 'revision') return;

    if ($post->post_type != 'attachment'){
        $prefix = get_option('duplicate_post_title_prefix');
        $suffix = get_option('duplicate_post_title_suffix');
        if (!empty($prefix)) $prefix.= " ";
        if (!empty($suffix)) $suffix = " ".$suffix;
        if (get_option('duplicate_post_copystatus') == 0) $status = 'publish';
    }

    if( !$new_post_author ) {
        $new_post_author = psp_gf_duplicate_post_get_current_user();
    }

    $new_post = array(
        'menu_order' 		=> $post->menu_order,
        'comment_status' 	=> $post->comment_status,
        'ping_status' 		=> $post->ping_status,
        'post_author' 		=> $new_post_author->ID,
        'post_content' 		=> $post->post_content,
        'post_excerpt' 		=> (get_option('duplicate_post_copyexcerpt') == '1') ? $post->post_excerpt : "",
        'post_mime_type' 	=> $post->post_mime_type,
        'post_parent' 		=> $new_post_parent = empty($parent_id)? $post->post_parent : $parent_id,
        'post_password' 	=> $post->post_password,
        'post_status' 		=> $new_post_status = (empty($status))? $post->post_status: $status,
        'post_title' 		=> $prefix.$post->post_title.$suffix,
        'post_type' 		=> $post->post_type,
    );

    if(get_option('duplicate_post_copydate') == 1){
        $new_post['post_date'] = $new_post_date =  $post->post_date ;
        $new_post['post_date_gmt'] = get_gmt_from_date($new_post_date);
    }

    $new_post_id = wp_insert_post($new_post);

    psp_gf_duplicate_post_copy_post_meta_info( $new_post_id, $post );

    delete_post_meta($new_post_id, '_dp_original');
    delete_post_meta($new_post_id, '_psp_fe_global_template' );
    add_post_meta($new_post_id, '_dp_original', $post->ID);

    // If the copy is published or scheduled, we have to set a proper slug.
    if ($new_post_status == 'publish' || $new_post_status == 'future'){
        $post_name = wp_unique_post_slug($post->post_name, $new_post_id, $new_post_status, $post->post_type, $new_post_parent);

        $new_post = array();
        $new_post['ID'] = $new_post_id;
        $new_post['post_name'] = $post_name;

        // Update the post into the database
        wp_update_post( $new_post );
    }

    return $new_post_id;

}

function psp_gf_duplicate_post_copy_post_meta_info( $new_id, $post) {

    $post_meta_keys = get_post_custom_keys( $post->ID );

    if (empty($post_meta_keys)) return;

    foreach ($post_meta_keys as $meta_key) {
        $meta_values = get_post_custom_values( $meta_key, $post->ID );
        foreach ($meta_values as $meta_value) {
            $meta_value = maybe_unserialize($meta_value);
            add_post_meta($new_id, $meta_key, $meta_value);
        }
    }
}

function psp_gf_duplicate_post_get_current_user() {
	if (function_exists('wp_get_current_user')) {
		return wp_get_current_user();
	} else if (function_exists('get_currentuserinfo')) {
		global $userdata;
		get_currentuserinfo();
		return $userdata;
	} else {
		$user_login = $_COOKIE[USER_COOKIE];
		$current_user = $wpdb->get_results("SELECT * FROM $wpdb->users WHERE user_login='$user_login'");
		return $current_user;
	}
}


require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/3pointross/psp-gravityforms',
	__FILE__,
	'psp-gravityforms'
);

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');
