<?php do_action( 'psp_before_archive_project_listing' ); ?>

<div class="psp-archive-project-list cf">
    <?php
    while( $projects->have_posts() ): $projects->the_post(); global $post;

        $start_date = psp_text_date(get_field( 'start_date', $post->ID ));
        $end_date   = psp_text_date(get_field( 'end_date', $post->ID ));

        $priorities = psp_get_priorities_list();
        $priority = ( get_field('_psp_priority') ? get_field('_psp_priority') : 'normal' );
        $priority = $priorities[$priority];

        do_action( 'psp_archive_project_listing_before_row' ); ?>

        <div id="psp-archive-project-<?php echo esc_attr($post->ID); ?>" class="psp-archive-project" data-project="<?php the_title(); ?>" data-client="<?php the_field('client'); ?>" data-url="<?php the_permalink(); ?>">

            <?php do_action( 'psp_archive_project_listing_before_open', $post->ID ); ?>

            <div class="psp-row cf">
                <div class="psp-archive-project-title psp-col-md-12">

                    <?php if( current_user_can('see_priority_psp_projects') ): ?>
                        <span class="psp-priority psp-priority-<?php echo esc_attr($priority['slug']); ?>" data-placement="left" data-toggle="psp-tooltip" title="<?php echo esc_attr($priority['label']) . ' ' . esc_html( 'Priority', 'psp_projects' ); ?>" style="background-color: <?php echo $priority['color']; ?>"></span>
                    <?php endif; ?>

                    <?php do_action( 'psp_archive_project_listing_before_summary', $post->ID ); ?>

                    <hgroup>
                        <div class="psp-h3">
                            <a href="<?php the_permalink(); ?>">
                                 <?php /* the_title(); */ ?>
                    
                    <?php if( get_field('client') ): ?>
                    <span class="psp-client-dash"><?php the_field('client'); ?></span>
                    <?php endif; ?>
                    
                     <?php if( get_field('addr_judet') ): ?>
                    <span class="psp-client-dash">Judet: <?php the_field('addr_judet'); ?> </span>
    				<?php endif; ?>
                    
                    <?php if( get_field('clocalitate') ): ?>
                    <span class="psp-client-dash">Localitate: <?php the_field('clocalitate'); ?> </span>
					<?php endif; ?>
                    
                     <?php if( get_field('cstrada') ): ?>
                    <span class="psp-client-dash">Strada: <?php the_field('cstrada'); ?> </span>
					<?php endif; ?>
                    
                     <?php if( get_field('cnumar') ): ?>
                     <span class="psp-client-dash">Numar: <?php the_field('cnumar'); ?> </span>
					<?php endif; ?>
                    
                     <?php if( get_field('cbloc') ): ?>
                    <span class="psp-client-dash">Bloc: <?php the_field('cbloc'); ?> </span>
					<?php endif; ?>
                    
                     <?php if( get_field('cetaj') ): ?>
                    <span class="psp-client-dash">Etaj: <?php the_field('cetaj'); ?> </span>
					<?php endif; ?>
                    
                     <?php if( get_field('capartament') ): ?>
                    <span class="psp-client-dash">Ap: <?php the_field('capartament'); ?> </span>
                    <?php endif; ?>
                            </a>
                       </div>
                        <div class="psp-archive-updated"><?php esc_html_e( 'Updated on ', 'psp_projects' ); echo esc_html(get_the_modified_date()); ?> <span class="psp-pipe">|</span> <span class="psp-ali-view"><?php esc_html_e( 'View Project', 'psp_projects' ); ?></span></div>
                    </hgroup>

                    <?php do_action( 'psp_archive_project_listing_after_summary', $post->ID ); ?>

                </div>
            </div>
            <div class="psp-flex-row">
                <div class="psp-archive-list-progress">
                    <?php
                    do_action( 'psp_archive_project_listing_before_progress' );

                    $completed = psp_compute_progress($post->ID);
                    if( !$completed ) $completed = 0; ?>

                    <div class="psp-progress">
                        <span class="psp-<?php echo esc_attr($completed); ?>" data-toggle="psp-tooltip" data-placement="top" title="<?php echo esc_attr($completed . '% ' . __( 'Complete', 'psp_projects' ) ); ?>">
                            <b><?php echo esc_html($completed); ?>%</b>
                        </span>
                        <i class="psp-progress-label"> <?php esc_html_e('Progress','psp_projects'); ?> </i>
                   </div>

                    <?php
                    do_action( 'psp_archive_project_listing_before_timing' );

                    psp_the_simplified_timebar($post->ID);

                    do_action( 'psp_archive_project_listing_after_timing' );  ?>
                </div>
                <?php if( $start_date || $end_date ): ?>
                    <div class="psp-archive-list-dates psp-archive-list-meta">
                        <div class="psp-h5"><?php esc_html_e( 'Timeframe', 'psp_projects' ); ?></div>
                        <div class="psp-p">
                            <?php
                            if( $start_date ): ?>
                                <i class="fa fa-calendar-o"></i> <?php echo esc_html($start_date); ?>
                            <?php
                            endif;
                            if( $start_date && $end_date ) echo ' → ';
                            if( $end_date ): ?>
                                <i class="fa fa-calendar-o"></i> <?php echo esc_html($end_date); ?>
                            <?php
                            endif; ?>
                       </div>
                    </div>
                <?php
                endif;
                $current_phase = psp_get_current_phase($post->ID);
                if( $current_phase ): ?>
                    <div class="psp-archive-list-phase psp-archive-list-meta">
                        <div class="psp-h5"><?php esc_html_e( 'Current Phase', 'psp_projects' ); ?></div>
                        <div class="psp-p"><?php echo esc_html($current_phase['title']); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            
        <div class="psp-quick-overview__detailed">
			<?php
		 	include( psp_template_hierarchy( '/projects/overview/summary2' ) );
			do_action( 'psp_after_project_summary', $post_id ); ?>
		</div>
            
            <?php do_action( 'psp_archive_project_listing_before_close', $post->ID ); ?>
        </div>
    <?php endwhile; ?>
</div>

<?php do_action( 'psp_after_archive_project_listing' ); ?>

<?php
if( $projects->max_num_pages > 1 ): ?>

    <div class="psp-pagination">
        <?php
        $args = apply_filters( 'psp_archive_list_pagination_args', array(
            'current' => max( 1, get_query_var('paged') ),
            'total' => $projects->max_num_pages
        ) );
        echo paginate_links($args); ?>
    </div>

<?php endif; ?>
