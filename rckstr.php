<?php

/**
 * RCKSTR WordPress Plugin Template
 *
 * The plugin bootstrap file
 *
 * This file creates the plugin information in the plugin admin area of WordPress.
 * It also includes all dependencies used by this plugin, registers the activation
 * and deactivation functions and defines the function that starts the plugin.
 *
 * @package             RCKSTR
 * @since               1.0.0
 *
 * @wordpress-plugin
 * Plugin Name: RCKSTR WordPress Plugin Template
 * Description: RCKSTR WordPress Plugin Description
 * Version: 1.0.0
 * Author: Christoph Jürgens
 */


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

define( 'PLUGIN_VERSION', '1.0.0' );
define( 'VENDORS_DIR', plugin_dir_path( __FILE__ ) . 'vendors' );
define( 'PLUGIN_PATH', plugins_url() . '/rckstr');
define( 'PLUGIN_DIR', plugin_dir_path(__FILE__));

// Require autoloader
require plugin_dir_path(__FILE__) . 'src/autoload.php';



if ( class_exists( 'RCKSTR\Init' ) ) {

	$plugin = new RCKSTR\Init();

	// activation
	register_activation_hook( __FILE__, array( $plugin, 'activate' ) );

	// deactivation
	register_deactivation_hook( __FILE__, array( $plugin, 'deactivate' ) );

}
