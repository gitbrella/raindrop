<?php
/**
 * Single content page
 *
 * @var post_type   psp_pages
 */

include( psp_template_hierarchy( 'dashboard/header' ) );
include( psp_template_hierarchy( 'global/header/navigation-sub' ) ); ?>

<div id="psp-archive-container" class="psp-grid-gonainer-fluid">

    <div class="psp-col-md-8 psp-col-md-offset-2">

        <div id="psp-pages-content" class="psp-box psp-overview-box">
            <?php while( have_posts() ): the_post(); ?>

                <div class="psp-h4 psp-sub-title">
                    <?php if( isset($_GET['ref_project']) ): ?>
                        <a class="pspp-back-link" href="<?php echo esc_url( get_the_permalink($_GET['ref_project']) ); ?>"><?php echo esc_html( 'Back to Project', 'psp_projects' ); ?></a>
                    <?php endif; ?>
                    <?php the_title(); ?>
               </div>

                <?php
                if( pspp_user_has_page_access() ):

                    the_content();

                else:

                     panorama_login_form();

                endif; ?>

            <?php endwhile; ?>
        </div> <!--/.psp-overview-box-->

    </div>
</div> <!--/#psp-archive-container-->

<?php
include( psp_template_hierarchy( 'dashboard/footer' ) );
