<?php
/**
 * Plugin Name: Project Panorama Pages
 * Plugin URI: http://www.projectpanorama.com
 * Description: Add pages of content into Panorama
 * Version: 1.5
 * Author: SnapOrbital
 * Author URI: http://www.projectpanorama.com
 * License: GPL2
 * Text Domain: psp_projects
 */

do_action( 'psp_pages_before_init' );

$defintions = array(
    'PSP_PAGES_VER'  =>  '1.5',
    'PSP_PAGES_PATH' =>  plugin_dir_path( __FILE__ ),
    'PSP_PAGES_URL'  =>  plugin_dir_url( __FILE__ )
);

foreach( $defintions as $definition => $value ) {
    if( !defined($definition) ) define( $definition, $value );
}

if( !function_exists('psp_get_option') ) {
    return false;
}

add_action( 'psp_after_panorama_loaded', 'psp_pages_init' );

function psp_pages_init() {
    include_once( 'lib/init.php' );
}

do_action( 'psp_pages_after_init' );
