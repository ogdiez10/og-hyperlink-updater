<?php 
/**
 * Plugin Name: OG Hyperlink Updater
 * Description: Lite wordpress Hyperlink updater for posts and pages.
 * Plugin URI: https://diez10.mx/plugins
 * Author: @OGdiez10
 * Version: 0.0.1
 * Author URI: https://diez10.mx
 */

function hyperlink_admin_page() { 
    add_menu_page( 'Hyperlink updater', 'Hyperlink updater', 'administrator', 'og-hyperlink-updater', 'og_hyperlink_updater_main', 'dashicons-update', '99');
}

add_action('admin_menu', 'hyperlink_admin_page');



function og_hyperlink_updater_main(){
   
    wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' );
    
    echo '<div id="hyperlinkUpdaterApp"><posts-plugin></posts-plugin></div>';

    wp_enqueue_script( 'app',  plugin_dir_url( __FILE__ ) . 'app.js' );

}

?>