<?php
/* 
Plugin Name: Remove Admin Bar
Plugin URI: http://dineshkarki.com.np/remove-admin-bar-for-client
Description: Remove Admin Bar From Front End.
Author: Dinesh Karki
Version: 2.2
Author URI: http://www.dineshkarki.com.np
*/

/*  Copyright 2012  Dinesh Karki  (email : dnesskarki@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
show_admin_bar( false );

add_action('admin_notices', 'wpa_notifications');
if (isset($_GET['wpa_hide_notifications']) == 1){
    update_option('wpa_hide_notifications','yes_13');
}
if (!function_exists('wpa_notifications')){
    function wpa_notifications(){
        if (get_option('wpa_hide_notifications') != 'yes_13'){
            if (!is_plugin_active('honeypot/wp-armour.php')){
                $wpa_supported_plugins   =  array(
                        'gravityforms.php' => 'Gravity Forms',
                        'bbpress.php'       => 'BBPress Forum',
                        'wp-contact-form-7.php'=> 'Contact Form 7',
                        'ninja-forms.php' => 'Ninja Forms',
                        'wpforms.php' => 'WP Forms',
                        'formidable.php' => 'Formidable Forms'
                );

                $active_plugins = get_option('active_plugins');
                foreach ($active_plugins as $key => $plugin) {
                    $pluginNameExplode = explode('/', $plugin);
                    $pluginnames[$pluginNameExplode[1]]       = $pluginNameExplode[1];
                }
                
                $supportedActivePlugins = array_intersect_key($wpa_supported_plugins, $pluginnames);

                if (!empty($supportedActivePlugins )){

                    if (get_option('users_can_register') == 1 ){
                        $supportedActivePlugins['wpregister'] = 'Registration';
                    }

                    if (get_option('default_comment_status') == 'open' ){
                        $supportedActivePlugins['wpcomments'] = 'Comments';
                    }
                    
                    $plugin_href = admin_url('plugin-install.php?tab=plugin-information&plugin=honeypot&TB_iframe=true&width=800&height=500');
                    $plugin_install_url = admin_url('plugin-install.php?s=WP+Armour&tab=search');

                     echo '<div class="notice notice-info" style="">
                            <p>Are you getting Spam in <strong>'.join(", ",$supportedActivePlugins).'</strong> ? With <a class="thickbox" href="'.$plugin_href.'">WP Armour</a> plugin you can block spam without using Captcha or Akismet.</p>
                            <p style="font-weight:bold;">
                                <a href="'.$plugin_install_url.'">Install WP Armour</a> | 
                                <a class="thickbox" href="'.$plugin_href.'">View Details</a> | 
                                <a href="?wpa_hide_notifications=1">Hide Message</a></p>
                     </div>';
                }
            }
        }
    }
}
?>