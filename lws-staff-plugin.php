<?php
/********************************
 * Plugin Name: LWS WpPlugin Staff
 * Plugin URI: https://github.com/mmecaroni/lws-wpplugin-staff
 * Description: Adds Staff CPT & Custom API endpoints for LWS Websites, Apps, Etc
 * Version: 0.0.4
 * Author: Mario Mecaroni
 * Author URI: http://www.liquidstudiogroup.com
 * License: MIT
 * Text Domain: lws-staff-plugin
 * GitHub Plugin URI: https://github.com/mmecaroni/lws-wpplugin-staff
 * GitHub Branch: main
 */

/****** Get lost! */
if (!defined('ABSPATH')) { exit; }

/****** Constants for Plugin Environment */
define( 'LWS_STAFF_VERSION', 'v0.0.4' );
define( 'LWS_STAFF_ASSETS', plugin_dir_url( __FILE__ ) );
define( 'LWS_STAFF_DIR', plugin_dir_path( __FILE__ ) );
define( 'LWS_STAFF_ROOT_FILE', __FILE__ );
define( 'LWS_STAFF_ROOT_FILE_RELATIVE_PATH', plugin_basename( __FILE__ ) );
define( 'LWS_STAFF_SLUG', 'lws-staff' );
define( 'LWS_STAFF_FOLDER', dirname( plugin_basename( __FILE__ ) ) );
define( 'LWS_STAFF_URL', plugins_url( '', __FILE__ ) );


/****** Load plugin assets css and js */
function Lws_staff_enqueue_style_script() {   
    wp_enqueue_style( 'lws_staff_css', LWS_STAFF_ASSETS . 'assets/css/lws-staff-style.css', '0.0.1' );
    wp_enqueue_script( 'lws_satff_script', LWS_STAFF_ASSETS . 'assets/js/lws-js.js',array('jquery'), '0.0.1'  );
	//wp_localize_script( 'lws_menu_script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'Lws_staff_enqueue_style_script' );

// Activation and Deactivation Hooks
register_activation_hook(__FILE__, 'custom_staff_plugin_activate');
register_deactivation_hook(__FILE__, 'custom_staff_plugin_deactivate');

function custom_staff_plugin_activate()
{
	// Activation code goes here
}

function custom_staff_plugin_deactivate()
{
	// Deactivation code goes here
}

// Include custom post type and taxonomy registration
require_once(LWS_STAFF_DIR . 'includes/custom-staff-post-type.php');
require_once(LWS_STAFF_DIR . 'includes/custom-staff-taxonomy.php');

// Staff ACF block
require_once(LWS_STAFF_DIR . 'acf-blocks/staff-action.php');

// Staff ACF group field
require_once(LWS_STAFF_DIR . 'lib/acf-field-group.php');

// Staff category Shortcode functions
require_once(LWS_STAFF_DIR . 'shortcode/custom-staff-shortcode.php');

// Staff CPT api endpoints functions
include_once LWS_STAFF_DIR . 'includes/api/cpt/api-read-staff.php';
include_once LWS_STAFF_DIR . 'includes/api/cpt/api-read-staff-id.php';
include_once LWS_STAFF_DIR . 'includes/api/cpt/api-read-staff-slug.php';

// Staff Categories api endpoint functions
include_once LWS_STAFF_DIR . 'includes/api/taxonomy/api-read-staff-categories.php';
include_once LWS_STAFF_DIR . 'includes/api/taxonomy/api-read-staff-category-slug.php';
include_once LWS_STAFF_DIR . 'includes/api/taxonomy/api-read-staff-category-id.php';

