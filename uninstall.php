<?php
/**
 * Uninstall script
 * 
 * Removes plugin data when plugin is deleted (not just deactivated)
 */

// Exit if not called by WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

global $wpdb;

// Delete options
delete_option( 'versana_companion_version' );
delete_option( 'versana_companion_activated' );