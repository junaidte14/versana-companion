<?php
/**
 * Plugin Name: Versana Companion
 * Description: Adds demo import and advanced features to Versana theme
 * Version: 1.4.1
 * Author: Junaid Hassan
 * Author URI: https://codoplex.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: versana-companion
 * Domain Path: /languages
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

// Security check - prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Plugin constants
 */
define( 'VERSANA_COMPANION_VERSION', '1.4.1' );
define( 'VERSANA_COMPANION_PATH', plugin_dir_path( __FILE__ ) );
define( 'VERSANA_COMPANION_URL', plugin_dir_url( __FILE__ ) );

/**
 * Check if Versana theme is active
 * 
 * Checks both direct theme activation and child theme scenarios
 * 
 * @return bool True if Versana active, false otherwise
 */
function versana_companion_is_theme_active() {
    // Get current theme
    $theme = wp_get_theme();
    
    // Check direct Versana activation
    if ( 'Versana' === $theme->get('Name') ) {
        return true;
    }
    
    // Check if child theme of Versana
    if ( 'versana' === $theme->get('Template') ) {
        return true;
    }
    
    // Versana not active
    return false;
}

/**
 * Initialize plugin
 * 
 * Runs after all plugins are loaded
 */
function versana_companion_init() {
    // First: Check theme compatibility
    if ( ! versana_companion_is_theme_active() ) {
        // Wrong theme - show error and stop
        add_action( 'admin_notices', 'versana_companion_theme_error_notice' );
        return;
    }
    
    require_once VERSANA_COMPANION_PATH . '/includes/demos.php';
    require_once VERSANA_COMPANION_PATH . '/includes/patterns.php';
    require_once VERSANA_COMPANION_PATH . '/includes/layout.php';
    require_once VERSANA_COMPANION_PATH . '/includes/optimizations.php';

}
add_action( 'plugins_loaded', 'versana_companion_init' );

// Ensure this is in your plugin's main constructor or root
add_action( 'init', function() {
    add_filter( 'wp_theme_json_data_theme', 'versana_apply_demo_variation_filter', 20 );
});

/**
 * Error notice for wrong theme
 */
function versana_companion_theme_error_notice() {
    // Get current theme name
    $theme = wp_get_theme();
    $current_theme = $theme->get('Name');
    ?>
    <div class="notice notice-error is-dismissible">
        <p>
            <strong>⚠️ Versana Companion Error:</strong>
            This plugin requires the Versana theme. 
            You currently have <strong><?php echo esc_html( $current_theme ); ?></strong> active.
        </p>
        <p>
            <a href="<?php echo admin_url('themes.php'); ?>" class="button button-primary">
                Go to Themes
            </a>
            <a href="https://wordpress.org/themes/versana/" class="button" target="_blank">
                Get Versana Theme
            </a>
        </p>
    </div>
    <?php
}

/**
 * Plugin activation
 * 
 * Creates database table for demo storage
 */
function versana_companion_activate() {
    // Save plugin version
    add_option( 'versana_companion_version', VERSANA_COMPANION_VERSION );
    add_option( 'versana_companion_activated', current_time( 'mysql' ) );
    
    // Set default options
    $default_options = array(
        'enable_demo_import' => 1,
        'default_demo'       => 'blog',
    );
    add_option( 'versana_companion_settings', $default_options );
}
register_activation_hook( __FILE__, 'versana_companion_activate' );

/**
 * Plugin deactivation
 */
function versana_companion_deactivate() {
    // Cleanup if needed
}
register_deactivation_hook( __FILE__, 'versana_companion_deactivate' );

/**
 * Load text domain for translations
 */
function versana_companion_load_textdomain() {
    load_plugin_textdomain(
        'versana-companion',
        false,
        dirname( plugin_basename( __FILE__ ) ) . '/languages'
    );
}
add_action( 'plugins_loaded', 'versana_companion_load_textdomain' );
