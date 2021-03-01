<?php
/**
 * psp-tasks.php
 *
 * Controls tasks and their related needs
 *
 * @category controller
 * @package psp-projects
 * @author Ross Johnson
 * @since 1.3.6
 */

 /**
  * Builds a list of tasks and returns an array of list items and task count
  *
  *
  * @param integer $id post ID
  * @param string $taskStyle (optional) for shortcodes, the type of tasks to return
  * @return array including a collection of tasks in list format and a count of items
  **/

 function psp_populate_tasks( $id , $task_style , $phase_id ) {

 	if( empty( $id ) ) {
 		global $post;
 		$id = $post->ID;
 	}

 	include( psp_template_hierarchy( '/parts/tasks.php' ) );

 	return $taskList;

 }

 function psp_get_task_title_by_key( $task_key = null, $post_id = null ) {

 	if( $task_key == null ) {
        return false;
    }

 	$post_id 	= ( $post_id == null ? get_the_ID() : $post_id );

    $phases = get_field( 'phases', $post_id );

    if( !$phases ) {
        return false;
    }

    foreach( $phases as $phase ) {

        if( !isset($phase['tasks']) || empty($phase['tasks']) ) {
            continue;
        }

        foreach( $phase['tasks'] as $task ) {

            if( $task['task_id'] == $task_key ) {
                return $task['task'];
            }

        }

    }

 	return false;

 }

 /**
  * psp_posts_where_tasks()
  *
  * Custom filter to replace '=' with 'LIKE' in a query so we can query by tasks assigned to a user
  *
  *
  */

 add_filter('posts_where', 'psp_posts_where_tasks');
 function psp_posts_where_tasks( $where ) {

    global $wpdb;

    if( method_exists( $wpdb, 'remove_placeholder_escape') ) {
        $where = str_replace("meta_key = 'tasks_%_assigned'", "meta_key LIKE 'tasks_%_assigned'", $wpdb->remove_placeholder_escape($where) );
    } else {
        $where = str_replace("meta_key = 'tasks_%_assigned'", "meta_key LIKE 'tasks_%_assigned'", $where );
    }

 	return $where;

 }

 /**
  *
  * Function psp_task_table
  *
  * Returns a table of tasks which can be open, complete or all
  *
  * @param $post_id (int), $shortcode (BOOLEAN), $taskStyle (string)
  * @return $output
  *
  */

 function psp_task_table( $post_id, $shortcode = null, $task_style = null ) {

     $output = '
     <table class="psp-task-table">
             <tr>
                 <th class="psp-tt-tasks">' . __( 'Task', 'psp_projects' ) . '</th>
                 <th class="psp-tt-phase">' . __( 'Phase', 'psp_projects') . '</th>';

     if($task_style != 'complete') {
         $output .= '<th class="psp-tt-complete">' . __( 'Completion', 'psp_projects' ) . '</th>';
     }

     $output .= '</tr>';

     while(has_sub_field('phases',$post_id)):

         $phaseTitle = get_sub_field('title');

         while(has_sub_field('tasks',$post_id)):

             $taskCompleted = get_sub_field('status');

             // Continue if you want to show incomplete tasks only and this task is complete
             if( ( $task_style == 'incomplete' ) && ( $taskCompleted == '100' ) ) { continue; }

             // Continue if you want to show completed tasks and this task is not complete
             if( ( $task_style == 'completed' ) && ( $taskCompleted != '100' ) ) { continue; }

             $output .= '<tr><td>'.get_sub_field('task').'</td><td>'.$phaseTitle.'</td>';

             if( $task_style != 'complete') { $output .= '<td><span class="psp-task-bar"><em class="status psp-' . get_sub_field( 'status' ) . '"></em></span></td></tr>'; }

         endwhile;

     endwhile;

     $output .= '</table>';

     return $output;

}

function psp_the_task_heading( $style, $count, $post_id = NULL ) {

    $post_id = ( $post_id == NULL ? get_the_ID() : $post->ID );

	if( get_sub_field( 'tasks', $post_id ) ) {

		if( $style == 'complete' ) {

			$title = '<span>'.$count[1].' '.__('completed tasks').'</span>';

		} elseif ( $style == 'incomplete' ) {

			$title = '<span>'.$count[1].' '.__('open tasks').'</span>';

		} else {

			$remaing_tasks = $tasks - $completed_tasks;

			$taskbar = '<span><b>'.$completed_tasks.'</b> '.__('of','psp_projects').' '.$tasks.' '.__('completed','psp_projects').'</span>';

		}

	} else {

		$taskbar = __( 'None assigned', 'psp_projects');

	}

	return $title;

}

function psp_get_tasks( $post_id, $phase_id, $style = 'all' ) {

	$tasks_array 	=	array();
	$phases 		= 	get_field( 'phases', $post_id );
	$tasks 			= 	$phases[ $phase_id ]['tasks'];

	$count = 0;

    if( $tasks && !empty($tasks) ) {

    	foreach( $tasks as $task ) {

    		$completion	= $task[ 'status' ];
    		$task['ID'] = $count;

    		$count++;

            if( ( $style == 'incomplete' ) && ( $completion == '100' ) ) { continue; }

            // Continue if you want to show completed tasks and this task is not complete
            if( ( $style == 'complete' ) && ( $completion != '100') ) { continue; }

    		$tasks_array[] = $task;

    	}

    }

	return $tasks_array;

}

function psp_get_task_item_classes( $post_id = null ) {

    $post_id = ( $post_id == NULL ? get_the_ID() : $post_id );
	$classes = '';

	if( ( psp_can_edit_project( $post_id ) ) && ( get_post_type() == 'psp_projects') ) {
		$classes .= 'psp-can-edit ';
	}

	return apply_filters( 'psp_task_item_classes', $classes );

}

function psp_the_task_item_classes( $post_id = NULL ) {

    $post_id = ( $post_id == NULL ? get_the_ID() : $post_id );

	echo psp_get_task_item_classes( $post_id );

}

function psp_get_user_task_stats( $user_id = null ) {

    $cuser   = wp_get_current_user();
    $user_id = ( $user_id == null ? $cuser->ID : $user_id );

    $stats = array(
        'total'             =>  0,
        'in_progress'       =>  0,
        'not_started'       =>  0,
        'completed'         =>  0,
        'overdue'           =>  0
    );

    $args = array(
        'post_type'		  => 'psp_projects',
        'posts_per_page'  => -1,
        'tax_query' 	  => array(
                array(
                    'taxonomy'	=>	'psp_status',
                    'field'		=>	'slug',
                    'terms'		=>	'completed',
                    'operator'	=>	'NOT IN'
                )
        ),
        'meta_query' 	=> array(
            'key'       => '%_assigned',
            'value'     => $user_id,
        )
    );
    $user_projects = new WP_Query($args);

    while( $user_projects->have_posts()): $user_projects->the_post();

        $phases = get_field('phases');

        if( !$phases ) {
            continue;
        }

        foreach( $phases as $phase ) {

            if( !isset($phase['tasks']) || empty($phase['tasks']) ) {
                continue;
            }

            foreach( $phase['tasks'] as $task ) {

                if( $task['assigned'] != $user_id ) {
                    continue;
                }

                $stats['total']++;

                if( $task['status'] == 100 ) {
                    $stats['completed']++;
                } elseif( $task['status'] == 0 ) {
                    $stats['not_started']++;
                } else {
                    $stats['in_progress']++;
                }

                if( $task['status'] != 100 && isset($task['due_date']) && !empty($task['due_date']) ) {

                    $date 	= strtotime( $task[ 'due_date' ] );
                    $format = get_option( 'date_format' );

                    if( $date < strtotime( 'today' )  ) {
                        $stats['overdue']++;
                    }

                }

            }

        }

    endwhile;

    return $stats;

}

function psp_get_all_my_tasks() {

	if( !is_user_logged_in() ) return FALSE;

	// Get the current logged in WordPress user object
	$cuser 	= 	wp_get_current_user();
	$tasks	=	array();

	// Query all the projects where this user has been assigned a task
	$args = array(
		'post_type'		  => 'psp_projects',
		'posts_per_page'  => -1,
		'tax_query' 	  => array(
				array(
					'taxonomy'	=>	'psp_status',
					'field'		=>	'slug',
					'terms'		=>	'completed',
					'operator'	=>	'NOT IN'
				)
		),
        'meta_query' 	=> array(
            'key'       => '_%_assigned',
            'value'     => $cuser->ID,
        )
	);

	$args = apply_filters( 'psp_get_all_my_tasks_args', $args );

	// Query with the above arguments
	$projects 	= new WP_Query($args);

	while( $projects->have_posts()): $projects->the_post();

		global $post;

        if( !panorama_check_access($post->ID) ) {
            continue;
        }

		$phases 		= array();
		$task_id 		= 0;
		$phase_count 	= 0;

		while( have_rows( 'phases' ) ) {

			$phase = the_row();

			$phase_name		=	get_sub_field( 'title' );
			$phase_tasks	=	array();

			while( have_rows( 'tasks' ) ) {

				$task = the_row();

				if ( get_sub_field( 'assigned' ) == $cuser->ID ) {
					$phase_tasks[] = array(
						'task'		=>	get_sub_field( 'task' ),
						'status'	=>	get_sub_field( 'status' )
					);
				}

				// Allows adding to $phase_tasks by reference
				do_action_ref_array( 'psp_get_all_my_tasks_loop', array( &$phase_tasks, $phase, $task ) );

			}

			if( !empty( $phase_tasks ) ) {
				$phases[] = array(
					'phase'		=>	get_sub_field( 'title' ),
					'tasks'		=>	$phase_tasks
				);
			}

		}

		if( !empty( $phases ) ) {
			$tasks[] = array(
				'project_id'	=>		$post->ID,
				'project_name'	=>		get_the_title( $post->ID ),
				'phases'		=>		$phases
			);
		}

	endwhile;

	return $tasks;

}

function psp_get_status_percentages() {

    return apply_filters( 'psp_status_percentages', array(
        '0'     =>  '0%',
        '5'     =>  '5%',
        '10'    =>  '10%',
        '15'    =>  '15%',
        '20'    =>  '20%',
        '25'    =>  '25%',
        '30'    =>  '30%',
        '35'    =>  '35%',
        '40'    =>  '40%',
        '45'    =>  '45%',
        '50'    =>  '50%',
        '55'    =>  '55%',
        '60'    =>  '60%',
        '65'    =>  '65%',
        '70'    =>  '70%',
        '75'    =>  '75%',
        '80'    =>  '80%',
        '85'    =>  '85%',
        '90'    =>  '95%',
        '100'   =>  '100%'
    ) );

}

function psp_find_tasks_by_due_date( $date = NULL, $notification = NULL ) {

    $tasks      = array();
    $date 		= ( $date == NULL ? date('Ymd') : $date );

    global $wpdb;

    $rows = $wpdb->get_results($wpdb->prepare(
            "
            SELECT *
            FROM {$wpdb->prefix}postmeta
            WHERE meta_key LIKE %s
                AND meta_value = %s
            ",
            'phases_%_tasks_%_due_date', // meta_name: $ParentName_$RowNumber_$ChildName
            $date // meta_value: 'type_3' for example
        ) );

    if( !$rows ) return false;

    foreach( $rows as $row ) {

        // Skip any unpublished projects
        if( get_post_status( $row->post_id ) != 'publish' ) continue;

        preg_match_all( '_([0-9]+)_', $row->meta_key, $matches );

        $phase_id   = $matches[0][0];
        $task_id    = $matches[0][1];

        $phases = get_field( 'phases', $row->post_id );

        // Skip any completed tasks
        if( $phases[$phase_id]['tasks'][$task_id]['status'] == 100 ) continue;

        // Confirm the task is assigned to the current user
        if( $phases[$phase_id]['tasks'][$task_id]['due_date'] != $date ) continue;

        $this_task = array(
            'name'          =>  $phases[$phase_id]['tasks'][$task_id]['task'],
            'assigned'      =>  $phases[$phase_id]['tasks'][$task_id]['assigned'],
            'task_id'       =>  $task_id,
            'phase_id'      =>  $phase_id,
            'post_id'       =>  $row->post_id,
            'project_id'    =>  $row->post_id,
            'phase'         =>  $phases[$phase_id]['title'],
            'due_date'      =>  $phases[$phase_id]['tasks'][$task_id]['due_date'],
            'status'        =>  $phases[$phase_id]['tasks'][$task_id]['status'],
            'description'   =>  $phases[$phase_id]['tasks'][$task_id]['task_description'],
            'user_id'       =>  $phases[$phase_id]['tasks'][$task_id]['assigned'],
        );

        $tasks[] = $this_task;

        // If this is a notification, send it
        if( $notification ) do_action( 'psp_notify', $notification, $this_task );

    }

    return $tasks;

}

add_filter( 'acf/save_post', 'psp_notify_new_task_assignment', 9, 3 );
function psp_notify_new_task_assignment( $post_id ) {


    // Skip if not a PSP Project
    if( get_post_type($post_id) != 'psp_projects' ) return;


    /*
     * Reasons to skip - no fields, no phases
     */

     $post_index = ( isset($_POST['fields']) ? 'fields' : 'acf' );

    if( !isset( $_POST[$post_index]) || empty( $_POST[$post_index]) || !isset($_POST[$post_index]['field_527d5dc12fa29']) ) return;

    $notifications  = array();
    $old_phases     = get_field( 'phases', $post_id );
    $phases         = $_POST[$post_index]['field_527d5dc12fa29'];

    $tasks = array();

    // Loop through each phase and then each task within a phase
    $phase_id = 0;

    if( !$phases || empty($phases) ) {
        return;
    }

    foreach( $phases as $phase ) {

        $task_id = 0;

        if( empty( $phase['field_527d5dfd2fa2d'] ) ) continue;

        // Loop through each task to try and find new tasks or assignment switches
        foreach( $phase['field_527d5dfd2fa2d'] as $task ) {

            $do_notify = true;

            // If this task isn't assigned to anyone, continue
            if( !isset($task['field_532b8da69c46e'] ) || empty($task['field_532b8da69c46e']) || $task['field_532b8da69c46e'] == 'unassigned' ) $do_notify = false;

            $tasks[] = $task;

            if( $old_phases ): foreach( $old_phases as $old_phase ):

                    if( $old_phase['phase_id'] != $phase['psp_phase_id'] ) continue;

                    if( isset($old_phase['tasks']) && !empty($old_phase['tasks']) ) {

                        foreach( $old_phase['tasks'] as $old_task ) {
                            if( $old_task['task'] == $task['field_527d5e072fa2e'] && $old_task['assigned'] == $task['field_532b8da69c46e'] ) $do_notify = false;
                        }

                    }

            endforeach; endif;

            if( $do_notify ) {

                /**
                 * Create a space for this users notifications if they haven't already been set
                 *
                 */
                if( !isset( $notifications[$task['field_532b8da69c46e']] ) ) {
                    $notifications[$task['field_532b8da69c46e']] = array(
                        'post_id'       =>  $post_id,
                        'project_id'    =>  $post_id,
                        'user_id'       =>  $task['field_532b8da69c46e'],
                        'user_ids'      =>  array( $task['field_532b8da69c46e'] ),
                        'phases'        =>  array()
                    );
                }

                /**
                 * Populate the phase information if it doesn't already exist
                 *
                 */
                if( !isset( $notifications[$task['field_532b8da69c46e']]['phases'][$phase_id] ) ) {
                    $notifications[$task['field_532b8da69c46e']]['phases'][$phase_id] = array(
                        'phase_title'   =>  $phase['field_527d5dd02fa2a']
                    );
                }

                /**
                 * Add the task to the phase for notification
                 *
                 */
                $notifications[$task['field_532b8da69c46e']]['phases'][$phase_id]['tasks'][] = array(
                    'name'          =>  $task['field_527d5e072fa2e'],
                    'task_id'       =>  $task_id,
                    'description'   =>  $task['psp_task_description'],
                    'due_date'      =>  $task['psp_task_due_date'],
                    'status'        =>  $task['field_527d5e0e2fa2f'],
                );

            }

            $task_id++;

        }

        $phase_id++;

    }

    if( !empty($notifications) ) {
        foreach( $notifications as $notification ) do_action( 'psp_notify', 'task_assigned', $notification );
    }

}

function psp_task_is_private( $task_key = null, $post_id = null ) {

    if( $task_key == null ) {
        return false;
    }

    if( $post_id == null ) {
        $post_id = get_the_ID();
    }

    $phases = get_field( 'phases', $post_id );

    if( !$phases || empty($phases) ) {
        return false;
    }

    foreach( $phases as $phase ) {

        $tasks = $phase['tasks'];

        if( !$tasks || empty($tasks) ) {
            return false;
        }

        foreach( $tasks as $task ) {

            if( $task['task_id'] == $task_key && $phase['private_phase'] ) {
                return true;
            }

        }

    }

    return false;

}
