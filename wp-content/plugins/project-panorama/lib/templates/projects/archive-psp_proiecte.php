<?php
/**
 * Project Dashboard
 *
 * Location the users first login to and get an overview of their projects
 * @var post_type	psp_projects
 */

include( psp_template_hierarchy( 'dashboard/header' ) );

$projects_per_page  = intval(psp_get_option('psp_projects_per_page'));
if( !$projects_per_page ) {
	$projects_per_page = get_option('posts_per_page');
}

$count     = apply_filters( 'psp_archive_project_listing_count', ( isset($_GET['count']) ? $_GET['count'] : $projects_per_page ) );
$status    = apply_filters( 'psp_archive_project_listing_status', ( get_query_var('psp_status_page') ? get_query_var('psp_status_page') : 'active' ) );
$paged     = ( get_query_var('paged') ? get_query_var('paged') : 1 );
$args      = apply_filters( 'psp_archive_project_listing_args', psp_setup_all_project_args($_GET) );
$projects	= psp_get_all_my_projects( $status, $count, $paged, $args );
$tasks 		= psp_get_all_my_tasks();
?>

<?php include( psp_template_hierarchy( 'global/header/navigation-sub' ) ); ?>

<div id="psp-archive-container" class="psp-grid-container-fluid">
	<div class="psp-grid-row">
		<div id="psp-archive-content">
			<div class="psp-grid-row">

				<div class="psp-col-lg-9 psp-col-md-8">

					<?php
					do_action( 'psp_dashboard_before_my_projects' );

					include( psp_template_hierarchy( 'dashboard/components/projects/my-projects.php' ) );

					do_action( 'psp_dashboard_after_my_projects' );

					if( $tasks ) include( psp_template_hierarchy( 'dashboard/components/tasks/dashboard.php' ) );

					do_action( 'psp_dashboard_after_my_tasks' );

					?>

				</div> <!--/.psp-col-md-8-->

				<aside id="psp-archive-sidebar" class="psp-col-lg-3 psp-col-md-4">

					<?php do_action( 'psp_before_dashboard_widgets' ); ?>

                    <?php do_action( 'psp_dashboard_widgets' ); ?>

					<div class="psp-archive-widget psp-projects-widget cf">

						<h4><?php esc_html_e( 'Projects', 'psp_projects' ); ?></h4>

						<?php echo psp_get_project_breakdown(); ?>

					</div>

					<?php
					$task_stats = psp_get_user_task_stats( $cuser->ID );
					if( $task_stats['total'] != 0 ): ?>

						<div class="psp-archive-widget psp-tasks-widget">

							<h4><?php esc_html_e( 'Tasks', 'psp_projects' ); ?></h4>

							<?php
							$colors = apply_filters( 'psp_project_breakdown_colors', array(
						            'complete'      =>  psp_get_option( 'psp_accent_color_1', '#2a3542' ),
						            'incomplete'    =>  psp_get_option( 'psp_accent_color_2', '#3299bb' ),
						            'unstarted'     =>  '#666666'
						    ) );

							$percent_complete 	 = 0;
							$percent_not_started = 0;
							$percent_in_progress = 0;

							if( $task_stats['completed'] != 0 && $task_stats['total'] != 0 ) {
								$percent_complete = floor( $task_stats['completed'] / $task_stats['total'] * 100 );
							}

							if( $task_stats['not_started'] != 0 && $task_stats['total'] != 0 ) {
								$percent_not_started = floor( $task_stats['not_started'] / $task_stats['total'] * 100 );
							}

							$percent_in_progress = 100 - $percent_complete - $percent_not_started; ?>

						    <div class="psp-chart-wrap">

						        <?php do_action( 'psp_before_task_dashboard_chart', $task_stats ); ?>

							       <div class="psp-chart">
								        <canvas id="psp-task-dashboard-chart" width="100%" height="150"></canvas>
							       </div>

						           <?php do_action( 'psp_after_task_dashboard_chart', $task_stats ); ?>

						    </div>

							<script>

						        jQuery(document).ready(function() {

									var chartOptions = {
										responsive: true,
										percentageInnerCutout : <?php echo esc_js( apply_filters( 'psp_graph_percent_inner_cutout', 92 ) ); ?>
									}

						            var data = [
						                {
						                    value: <?php echo $percent_complete; ?>,
						                    color: "<?php echo $colors[ 'complete' ]; ?>",
						                    label: "Complete"
						                },
						                {
						                    value: <?php echo $percent_in_progress; ?>,
						                    color: "<?php echo $colors[ 'incomplete' ]; ?>",
						                    label: "Active"
						                },
						                {
						                    value: <?php echo $percent_not_started; ?>,
						                    color: "<?php echo $colors[ 'unstarted' ]; ?>",
						                    label: "Not Started"
						                }
						            ];


						            var psp_task_dashboard_chart = document.getElementById("psp-task-dashboard-chart").getContext("2d");

						            new Chart(psp_task_dashboard_chart).Doughnut(data,chartOptions);

						        });

							</script>

							<ul class="psp-projects-overview">
								   <li>
									   <span class="psp-dw-projects"><?php echo esc_html( $task_stats['total'] ); ?></span>
									   <strong><?php esc_html_e( 'Assigned', 'psp_projects' ); ?></strong>
								   </li>
								   <li>
									   <span class="psp-dw-completed" style="color: <?php echo $colors[ 'complete' ]; ?>"><?php echo $task_stats['completed']; ?></span>
									   <strong><?php esc_html_e( 'Complete', 'psp_projects' ); ?></strong>
								   </li>
								   <li>
									   <span class="psp-dw-active" style="color: <?php echo $colors[ 'incomplete' ]; ?>"><?php echo $task_stats['in_progress']; ?></span>
									   <strong><?php esc_html_e( 'Active', 'psp_projects' ); ?></strong>
								   </li>
								   <li>
									   <span class="psp-dw-types" style="color:#c44d58 !important;"><?php echo $task_stats['overdue']; ?></span>
									   <strong><?php esc_html_e( 'Overdue', 'psp_projects' ); ?></strong>
								   </li>
							 </ul>

						</div>

					<?php
					endif;

					$teams = psp_get_user_teams();
					if( $teams ): ?>
						<div class="psp-archive-widget psp-teams-archive-widget">

							<h4><?php esc_html_e( 'My Teams', 'psp_projects' ); ?></h4>

							<ul class="psp-team-list">
								<?php foreach( $teams as $team ):
									$members = get_field( 'team_members', $team->ID ); ?>
									<li>
										<?php psp_team_user_icons( $team->ID ); ?>
										<a href="<?php echo esc_url( get_the_permalink( $team->ID ) ); ?>">
											<span>
												<strong class="psp-accent-color-1"><?php echo esc_html( get_the_title( $team->ID ) ); ?></strong>
												<em><?php echo count( $members ) . ' ' . __( 'Members', 'psp_projects' ); ?></em>
											</span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>

						</div>
					<?php endif; ?>

					<div class="psp-archive-widget psp-calendar-archive-widget">
						<p><a class="psp-ical-link pull-right psp-archive-ical-link" href="<?php echo psp_get_ical_link(); ?>" target="_new"><?php echo esc_html_e( 'iCal Feed', 'psp_projects' ); ?></a></p>
						<h4><?php esc_html_e( 'Calendar', 'psp_projects' ); ?></h4>
						<?php echo psp_output_project_calendar(); ?>
					</div> <!--/.psp-archive-widget-->

                    <?php do_action( 'psp_after_dashboard_widgets' ); ?>

				</aside>

			</div> <!--/.psp-grid-row-->
		</div> <!--/.#psp-archive-content-->
	</div> <!--/.psp-grid-row-->
</div> <!--/#psp-archive-container-->

<?php
include( psp_template_hierarchy( 'dashboard/footer.php' ) );
