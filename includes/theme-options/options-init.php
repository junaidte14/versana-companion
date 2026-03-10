<?php
/**
 * Versana Theme Options Initialization
 *
 * Core functions for theme options system.
 *
 * @package Versana
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get theme option value
 *
 * Main function to retrieve option values throughout the theme.
 *
 * @param string $key Option key
 * @param mixed $default Default value if option doesn't exist
 * @return mixed Option value
 */
function versana_get_option( $key, $default = null ) {
    $options = get_option( 'versana_theme_options', array() );
    
    if ( isset( $options[ $key ] ) ) {
        return $options[ $key ];
    }
    
    return $default !== null ? $default : versana_get_default_option( $key );
}

/**
 * Get all theme options
 *
 * @return array Complete options array
 */
function versana_get_all_options() {
    $saved_options = get_option( 'versana_theme_options', array() );
    $defaults = versana_get_default_options();
    return wp_parse_args( $saved_options, $defaults );
}

/**
 * Update a single theme option
 *
 * @param string $key Option key
 * @param mixed $value New value
 * @return bool True if successful
 */
function versana_update_option( $key, $value ) {
    $options = get_option( 'versana_theme_options', array() );
    $options[ $key ] = $value;
    return update_option( 'versana_theme_options', $options );
}

/**
 * Register theme settings with WordPress
 */
function versana_register_theme_settings() {
    register_setting(
        'versana_options',
        'versana_theme_options',
        array(
            'type'              => 'array',
            'sanitize_callback' => 'versana_sanitize_options',
            'default'           => versana_get_default_options(),
        )
    );
}
add_action( 'admin_init', 'versana_register_theme_settings' );

/**
 * Enqueue admin assets
 *
 * @param string $hook Current admin page
 */
function versana_enqueue_admin_assets( $hook ) {
    if ( 'appearance_page_versana-options' !== $hook ) {
        return;
    }
    
    wp_enqueue_style(
        'versana-theme-options',
        VERSANA_COMPANION_URL . 'assets/css/theme-options.css',
        array(),
        VERSANA_COMPANION_VERSION
    );
    
    wp_enqueue_script(
        'versana-theme-options',
        VERSANA_COMPANION_URL . 'assets/js/theme-options.js',
        array( 'jquery' ),
        VERSANA_COMPANION_VERSION,
        true
    );
}
add_action( 'admin_enqueue_scripts', 'versana_enqueue_admin_assets' );

/**
 * Get registered option tabs
 *
 * This is the key function for extensibility!
 * Child themes and plugins can add their own tabs.
 *
 * @return array Array of tabs
 */
function versana_get_option_tabs() {
    $tabs = array(
        'integrations' => array(
            'title'    => __( 'Integrations', 'versana' ),
            'icon'     => 'dashicons-admin-links',
            'callback' => 'versana_render_integrations_tab',
            'priority' => 60,
        ),
    );
    
    /**
     * Filter theme option tabs
     *
     * This allows child themes and plugins to add custom tabs!
     *
     * Example usage in child theme:
     * add_filter( 'versana_option_tabs', 'child_add_shop_tab' );
     * function child_add_shop_tab( $tabs ) {
     *     $tabs['shop'] = array(
     *         'title'    => __( 'Shop Settings', 'child-theme' ),
     *         'icon'     => 'dashicons-cart',
     *         'callback' => 'child_render_shop_tab',
     *         'priority' => 45, // Between Blog (40) and Performance (50)
     *     );
     *     return $tabs;
     * }
     *
     * @param array $tabs Array of tab configurations
     */
    $tabs = apply_filters( 'versana_option_tabs', $tabs );
    
    // Sort by priority
    uasort( $tabs, function( $a, $b ) {
        return ( $a['priority'] ?? 999 ) - ( $b['priority'] ?? 999 );
    } );
    
    return $tabs;
}