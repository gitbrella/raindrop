<?php
add_filter( 'template_include', 'psp_pages_template_page' );
function psp_pages_template_page( $template ) {

    if( 'psp_pages' != get_post_type() ) return $template;

    return apply_filters( 'psp_pages_single_template', PSP_PAGES_PATH . 'lib/views/templates/page.php' );

}

add_action( 'psp_footer', 'psp_include_footer_call' );
function psp_include_footer_call() {

    if( psp_get_option('psp_enable_wp_footer') || 'psp_pages' != get_post_type() ) return false;

    wp_footer();

}

add_action( 'psp_head', 'psp_project_page_styles' );
function psp_project_page_styles() {

    psp_register_style( 'psp-pages', PSP_PAGES_URL . 'assets/psp-pages.css' );

    if( psp_get_option('psp_enable_wp_header') || 'psp_pages' != get_post_type() ) return false;

    wp_head();

}

add_filter( 'psp_get_the_title', 'pspp_return_the_title' );
function pspp_return_the_title( $title ) {

     if( get_post_type() !== 'psp_pages' ) {
          return $title;
     }

     return wp_title( false, false );

}
