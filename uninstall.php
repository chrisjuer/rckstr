
<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  RCKSTR
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete data created by custom post type

// Delete data in wp_option table