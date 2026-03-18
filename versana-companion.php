<?php
/**
 * Plugin Name: Versana Companion
 * Description: Adds demo import and advanced features to the Versana theme
 * Version: 1.0.0
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
define( 'VERSANA_COMPANION_VERSION', '1.0.0' );
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
    
    /**
     * Load theme options system
     *
     * Files are loaded in specific order for dependencies.
     * Only admin page loads in admin area (conditional loading).
     */
    $theme_options_path = VERSANA_COMPANION_PATH . 'includes/theme-options/';
    // Load in order of dependency
    if ( file_exists( $theme_options_path . 'options-defaults.php' ) ) {
        require_once $theme_options_path . 'options-defaults.php';
    }
    if ( file_exists( $theme_options_path . 'options-sanitize.php' ) ) {
        require_once $theme_options_path . 'options-sanitize.php';
    }
    if ( file_exists( $theme_options_path . 'options-init.php' ) ) {
        require_once $theme_options_path . 'options-init.php';
    }
    // Admin page (conditional - only in admin)
    if ( is_admin() && file_exists( $theme_options_path . 'options-page.php' ) ) {
        require_once $theme_options_path . 'options-page.php';
    }
    // Frontend output
    if ( file_exists( $theme_options_path . 'options-output.php' ) ) {
        require_once $theme_options_path . 'options-output.php';
    }

    require_once VERSANA_COMPANION_PATH . '/includes/customizer.php';
    require_once VERSANA_COMPANION_PATH . '/includes/demos.php';
    require_once VERSANA_COMPANION_PATH . '/includes/patterns.php';
    require_once VERSANA_COMPANION_PATH . '/includes/layout.php';
    // Include license verification
    require_once VERSANA_COMPANION_PATH . 'includes/license.php';
    // PRO Features
    require_once VERSANA_COMPANION_PATH . 'includes/premium-features.php';

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
    $theme = wp_get_theme();
    $current_theme = $theme->get( 'Name' );
    ?>
    <div class="notice notice-error is-dismissible">
        <p>
            <strong><?php esc_html_e( '⚠️ Versana Companion Error:', 'versana-companion' ); ?></strong>
            <?php esc_html_e( 'This plugin requires the Versana theme.', 'versana-companion' ); ?>
            <?php
            printf(
                /* translators: %s: The name of the currently active theme */
                esc_html__( 'You currently have %s active.', 'versana-companion' ),
                '<strong>' . esc_html( $current_theme ) . '</strong>'
            );
            ?>
        </p>
        <p>
            <a href="<?php echo esc_url( admin_url( 'themes.php' ) ); ?>" class="button button-primary">
                <?php esc_html_e( 'Go to Themes', 'versana-companion' ); ?>
            </a>
            <a href="<?php echo esc_url( 'https://wordpress.org/themes/versana/' ); ?>" class="button" target="_blank">
                <?php esc_html_e( 'Get Versana Theme', 'versana-companion' ); ?>
            </a>
        </p>
    </div>
    <?php
}

/**
 * Plugin activation
 * 
 */
function versana_companion_activate() {
    // Save plugin version
    add_option( 'versana_companion_version', VERSANA_COMPANION_VERSION );
    add_option( 'versana_companion_activated', current_time( 'mysql' ) );
}
register_activation_hook( __FILE__, 'versana_companion_activate' );

/**
 * Plugin deactivation
 */
function versana_companion_deactivate() {
    // Cleanup if needed
}
register_deactivation_hook( __FILE__, 'versana_companion_deactivate' );
