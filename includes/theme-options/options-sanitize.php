<?php
/**
 * Versana Theme Options Sanitization
 *
 * SECURITY CRITICAL: All user input must be sanitized.
 *
 * @package Versana
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Sanitize all theme options
 *
 *
 * @param array $input Raw input from form
 * @return array Sanitized options
 */
function versana_sanitize_options( $input ) {
    // CRITICAL FIX: Start with existing options to preserve values from other tabs
    $existing_options = get_option( 'versana_theme_options', array() );
    $sanitized = $existing_options;
    
    // Verify nonce for security
    $nonce = isset( $_POST['versana_options_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['versana_options_nonce'] ) ) : '';
    // Verify the sanitized nonce
    if ( empty( $nonce ) || ! wp_verify_nonce( $nonce, 'versana_save_options' ) ) {
        add_settings_error(
            'versana_options',
            'versana_nonce_error',
            esc_html__( 'Security verification failed. Please try again.', 'versana-companion' ),
            'error'
        );
        return $existing_options; // Return unchanged if nonce fails
    }
    
    // Check if reset was requested
    if ( isset( $_POST['versana_reset_options'] ) ) {
        add_settings_error(
            'versana_options',
            'versana_reset_success',
            __( 'Theme options have been reset to defaults.', 'versana-companion' ),
            'updated'
        );
        return versana_get_default_options();
    }
    
    // Scripts (only for administrators with unfiltered_html capability)
    if ( current_user_can( 'unfiltered_html' ) ) {
        if ( isset( $input['header_scripts'] ) ) {
            $sanitized['header_scripts'] = $input['header_scripts'];
        }
        if ( isset( $input['footer_scripts'] ) ) {
            $sanitized['footer_scripts'] = $input['footer_scripts'];
        }
    }
    
    /**
     * Filter sanitized options
     *
     * Allows child themes to add custom sanitization.
     *
     * @param array $sanitized Sanitized options
     * @param array $input Raw input
     */
    $sanitized = apply_filters( 'versana_sanitize_options', $sanitized, $input );
    
    // Add success message
    /* add_settings_error(
        'versana_options',
        'versana_save_success',
        __( 'Settings saved successfully.', 'versana-companion' ),
        'updated'
    ); */
    
    return $sanitized;
}