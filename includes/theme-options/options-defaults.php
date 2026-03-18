<?php
/**
 * Versana Default Theme Options - V1.0.0 Simplified
 *
 * Core features only - Moved from main theme
 *
 * @package Versana
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get default theme options
 *
 * V1.0.0: Core blog features only
 *
 * @return array Default options array
 */
function versana_get_default_options() {
    $defaults = array(        
        // Integrations Tab
        'header_scripts'           => '',
        'footer_scripts'           => '',
    );
    
    /**
     * Filter default theme options
     *
     * Allows child themes and plugins to modify defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Default options
     */
    return apply_filters( 'versana_default_options', $defaults );
}

/**
 * Get a single default option value
 *
 * @since 1.0.0
 *
 * @param string $key Option key
 * @return mixed Default value or null
 */
function versana_get_default_option( $key ) {
    $defaults = versana_get_default_options();
    return isset( $defaults[ $key ] ) ? $defaults[ $key ] : null;
}