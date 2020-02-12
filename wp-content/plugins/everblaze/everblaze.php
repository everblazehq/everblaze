<?php
/**
* Plugin Name: Everblaze
* Plugin URI: http://www.everblaze.pro
* Description: The Everblaze plugin.
* Version: 0.0.3
* Author: Everblaze
* Author URI: http://www.everblaze.pro
**/

define( 'EB_PLUGIN', __FILE__ );
define( 'EB_PLUGIN_BASENAME', plugin_basename( EB_PLUGIN ) );
define( 'EB_PLUGIN_NAME', trim( dirname( EB_PLUGIN_BASENAME ), '/' ) );
define( 'EB_PLUGIN_DIR', untrailingslashit( dirname( EB_PLUGIN ) ) );

/**
** INCLUDES
**/
require_once EB_PLUGIN_DIR . '/includes/options.php';
require_once EB_PLUGIN_DIR . '/includes/matches.php';
require_once EB_PLUGIN_DIR . '/includes/sponsors.php';
require_once EB_PLUGIN_DIR . '/includes/blocks.php';

add_action('admin_enqueue_scripts', 'backend_css');
function backend_css() {
    wp_register_style( 'backend-css', plugin_dir_url( __FILE__ ) . 'includes/css/main.css');
    wp_enqueue_style( 'backend-css' );
}

add_action('acf/init', 'custom_options_textdomain');

function custom_options_textdomain() {

	acf_update_setting('l10n_textdomain', 'indivio');

}

/**
 * Hide items for Multisite
**/
add_action( 'plugins_loaded', 'hide_items_multisite' );

function hide_items_multisite() {

    $admins = array(
    	'admin',
    	'everblaze',
    );

    $current_user = wp_get_current_user();

    if( !in_array( $current_user->user_login, $admins ) ) {
    	add_filter('acf/settings/show_admin', '__return_false');

    	add_filter('all_plugins','mpl_hide_site_plugins', 12, 1);
    	function mpl_hide_site_plugins($plugins){
    		unset($plugins['advanced-custom-fields-pro/acf.php']);
    		unset($plugins['advanced-custom-fields-font-awesome/acf-font-awesome.php']);
    		unset($plugins['acf-country-2.0.0/acf-country.php']);
    		return $plugins;
    	}

    	add_action( 'admin_menu', 'remove_menus' );
    	function remove_menus() {
            $subs = wu_get_current_subscription();
            if (!empty($subs)){
                $plandata = $subs->get_plan();
                $plan_name = $plandata->title;
            }
            if ( $plan_name == 'Pro') {
                remove_menu_page( 'plugins.php' );
            }
    		remove_menu_page( 'tools.php' );
    		remove_menu_page( 'edit.php?post_type=mollie-forms' );
    		remove_menu_page( 'admin.php?page=wp-mail-smtp' );
            remove_menu_page( 'admin.php?page=wp-mail-smtp-logs' );
    	}

    	add_action( 'admin_head', 'remove_admin_notices', 50 );
        function remove_admin_notices() {
    		remove_action( 'admin_notices', 'show_upgrade_notice' );
    		remove_action( 'admin_notices', 'maybe_notify_cdn_error' );
        }
    }
}
//
// /**
//  * ACF: Groups to JSON
// **/
//
// // get all the local field groups
// $field_groups = acf_get_local_field_groups();
//
// // loop over each of the gield gruops
// foreach( $field_groups as $field_group ) {
//
// 	// get the field group key
// 	$key = $field_group['key'];
//
// 	// if this field group has fields
// 	if( acf_have_local_fields( $key ) ) {
//
//       	// append the fields
// 		$field_group['fields'] = acf_get_local_fields( $key );
//
// 	}
//
// 	// save the acf-json file to the acf-json dir by default
// 	acf_write_json_field_group( $field_group );
//
// }
