<?php

/* Custom Single.php for project only view */
$cuser = wp_get_current_user();
acf_form_head();

include( psp_template_hierarchy('dashboard/header') ); ?>

    <input id="psp-ajax-url" type="hidden" value="<?php echo esc_url(admin_url()); ?>admin-ajax.php">

	<?php
    do_action('psp_dashboard_page');
    do_action( 'psp_dashboard_page_' . __FILE__ ); ?>

	<?php if(is_user_logged_in()): ?>

        <style type="text/css">
            #psp-primary-header {
                display: none;
            }
        </style>

		<div id="psp-archive-container">

                   <div class="psp-fe-wizard-wrap">

                      <div class="psp-wizard-body">

                           <div class="psp-h4 psp-wizard-section">
                               <strong><?php esc_html_e( 'Step', 'psp-front-edit' );?> <span class="step">1</span> <?php esc_html_e( 'of', 'psp-front-edit' ); ?> 6</strong>
                               <span class="timeline-title"><?php esc_html_e( 'Overview', 'psp-front-edit' ); ?></span>
                          </div>

                           <?php

                           $templates  = psp_get_global_templates();
                           $action    = ( PSP_FE_PERMALINKS ? 'manage/duplicate/' : '&psp_manage_page=duplicate' );

                           if( $templates->have_posts() ): ?>

                               <div class="new-project-type-group">
                                   <div class="psp-p">
                                       <label for="psp-fe-brand-new">
                                           <input type="radio" name="psp-fe-project-type" value="new" id="psp-fe-brand-new" checked autocomplete="off"> <?php esc_html_e( 'Blank Project', 'psp_projects' ); ?>
                                       </label>
                                       <label for="psp-fe-from-template">
                                           <input type="radio" name="psp-fe-project-type" value="template" id="psp-fe-from-template" autocomplete="off"> <?php esc_html_e( 'Use Template', 'psp_projects' ); ?>
                                       </label>
                                  </div>
                               </div>

                               <div class="psp-form psp-fe-template-form">
                                   <form method="post" action="<?php echo esc_attr( get_post_type_archive_link('psp_projects') . $action ); ?>">
                                        <?php
                                        $cuser = wp_get_current_user();
                                        wp_nonce_field( 'duplicate_project_' . $cuser->ID ); ?>
                                        <input type="hidden" name="user_id" value="<?php echo esc_attr($cuser->ID); ?>">
                                        <div class="psp-fe-template-select">
                                           <select name="psp-fe-use-template" id="psp-fe-use-template">
                                               <option value="---"><?php esc_html_e( 'Use Template', 'psp_projects' ); ?></option>
                                               <?php while( $templates->have_posts() ): $templates->the_post(); global $post; ?>
                                                   <option value="<?php echo esc_attr( $post->ID ); ?>"><?php the_title(); ?></option>
                                               <?php endwhile; ?>
                                           </select>
                                           <input type="submit" class="psp-fe-use-template-submit pano-btn" value="Select" name="Select">
                                       </div>
                                   </form>
                               </div>
                           <?php
                           endif; ?>

                           <?php
                           psp_fe_acf_form();  ?>

                           <div class="psp-wizard-actions">
                               <input type="button" class="psp-wizard-prev-button psp-btn" value="Back"> <input type="button" class="psp-wizard-next-button psp-btn" value="Next">
                           </div>

                       </div>

                   </div> <!--/.psp-wizard-wrap-->

                   <div class="psp-p psp-wizard-cancel"><a href="<?php echo esc_url(get_post_type_archive_link('psp_projects')); ?>"><?php esc_html_e( 'Cancel', 'psp_projects' ); ?></a></div>

          </div>

     </div>


	<?php else: ?>

        <div id="overview" class="psp-comments-wrapper">

			<?php include( psp_template_hierarchy( 'global/login.php' ) ); ?>

        </div>
	<?php endif; ?>

    <?php
    if( PSP_VER == 5 ) {
        acf_enqueue_uploader();
    } ?>

    <?php
    include( psp_template_hierarchy( 'dashboard/footer.php' ) );
    wp_footer(); ?>

</body>
</html>
