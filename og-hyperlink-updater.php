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

    $plugin_dir_path = plugin_dir_url( __FILE__ );
    
    wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' );
    wp_register_style( 'ogstyles', $plugin_dir_path.'/styles.css' );
    wp_enqueue_style('ogstyles');

    echo '<div id="hyperlinkUpdaterApp"><posts-plugin></posts-plugin></div>';

    wp_register_script('ogapp', WP_PLUGIN_URL.'/og-hyperlink-updater/app.js',array(),NULL,true);
    wp_enqueue_script( 'ogapp',  plugin_dir_url( __FILE__ ) . 'app.js' );

    $wnm_custom = array( 'template_url' => get_bloginfo('url') );
    wp_localize_script( 'ogapp', 'wnm_custom', $wnm_custom ); //Works only if the script has already been registered.



}

?>