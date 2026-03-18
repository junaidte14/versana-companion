<?php
/**
 * Versana Theme Options Frontend Output
 *
 * Outputs theme option values to the frontend.
 *
 * @package Versana
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output header scripts with full tag support
 */
function versana_output_header_scripts() {
    $header_scripts = versana_get_option( 'header_scripts' );
    
    if ( empty( $header_scripts ) ) {
        return;
    }
    
    // Using a unified allowed-tags array for consistency across header/footer
    echo wp_kses( $header_scripts, array(
        'meta' => array(
            'name'       => true,
            'content'    => true,
            'charset'    => true,
            'http-equiv' => true,
            'property'   => true, // Support for Open Graph/Facebook
            'itemprop'   => true, // Support for Schema.org
        ),
        'script' => array(
            'src'    => true,
            'type'   => true,
            'async'  => true,
            'defer'  => true,
            'id'     => true,
            'class'  => true,
        ),
        'noscript' => array(),
        'style'    => array(
            'type'  => true,
            'id'    => true,
            'class' => true,
        ),
        'div' => array(
            'id'    => true,
            'class' => true,
            'style' => true,
        ),
        'iframe' => array(
            'src'         => true,
            'width'       => true,
            'height'      => true,
            'frameborder' => true,
            'style'       => true,
            'allow'       => true, // Added 'allow' for modern browser features
        ),
    ) );
}
add_action( 'wp_head', 'versana_output_header_scripts', 100 );

/**
 * Output footer scripts with proper security escaping
 */
function versana_output_footer_scripts() {
    $footer_scripts = versana_get_option( 'footer_scripts' );
    
    if ( empty( $footer_scripts ) ) {
        return;
    }
    
    // We allow script, noscript, and style tags specifically for external integrations
    echo wp_kses( $footer_scripts, array(
        'script' => array(
            'src'    => true,
            'type'   => true,
            'async'  => true,
            'defer'  => true,
            'id'     => true,
            'class'  => true,
        ),
        'noscript' => array(),
        'style'    => array(
            'type'  => true,
            'id'    => true,
            'class' => true,
        ),
        'div' => array(
            'id'    => true,
            'class' => true,
            'style' => true,
        ),
        'iframe' => array( // Common for chat widgets or maps
            'src'         => true,
            'width'       => true,
            'height'      => true,
            'frameborder' => true,
            'style'       => true,
        ),
    ) );
}
add_action( 'wp_footer', 'versana_output_footer_scripts', 100 );