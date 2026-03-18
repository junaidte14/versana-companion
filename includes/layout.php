<?php
/**
 * Versana Theme Layout Theme Options Tab
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ============================================================================
 * LAYOUT TAB - Show/Hide Page Titles
 * ============================================================================
 */

/**
 * Add Layout tab to theme options
 */
function versana_companion_add_layout_tab( $tabs ) {
    $tabs['layout'] = array(
        'title'    => __( 'Content & Layout', 'versana-companion' ),
        'icon'     => 'dashicons-admin-appearance',
        'callback' => 'versana_companion_render_layout_tab',
        'priority' => 10, // Between Demo Import (5) and Header (20)
    );
    
    return $tabs;
}
add_filter( 'versana_option_tabs', 'versana_companion_add_layout_tab' );

/**
 * Render Layout tab content
 */
function versana_companion_render_layout_tab() {
    ?>
    <div class="versana-tab-content">
        <h3><?php esc_html_e( 'Content/Layout Options', 'versana-companion' ); ?></h3>
        
        <table class="form-table" role="presentation">
            <tbody>
                <?php
                    /**
                     * Extensibility Hook: Add custom optimization settings
                     *
                     * Allows other plugins to add more optimization options
                     *
                     * @since 1.0.0
                     */
                    do_action( 'versana_layout_tab_settings' );
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

/**
 * Sanitize layout options (tab-aware) - FIXED VERSION
 *
 * @param array $sanitized Sanitized options array
 * @param array $input Raw input array
 * @return array Modified sanitized options
 */
function versana_companion_sanitize_layout_options( $sanitized, $input ) {    
    // Define all layout option keys
    $layout_keys = array(
        'premium_breadcrumbs',
        'premium_reading_progress',
        'premium_related_posts',
    );
    
    /**
     * CRITICAL FIX: Check the hidden active_tab field first (most reliable)
     */
    $is_layout_tab = false;
    
    // Primary detection: explicit tab identifier
    if ( isset( $input['active_tab'] ) && $input['active_tab'] === 'layout' ) {
        $is_layout_tab = true;
    }
    
    // Fallback detection: check if ANY layout field exists in input
    // (for backward compatibility if hidden field is missing)
    if ( ! $is_layout_tab && ! isset( $input['active_tab'] ) ) {
        foreach ( $layout_keys as $key ) {
            if ( array_key_exists( $key, $input ) ) {
                $is_layout_tab = true;
                break;
            }
        }
    }
    
    // Only process layout fields when Layout tab is being saved
    if ( $is_layout_tab ) {
        foreach ( $layout_keys as $key ) {
            // CRITICAL: Checkboxes are false if not in input (unchecked)
            $sanitized[ $key ] = isset( $input[ $key ] ) ? (bool) $input[ $key ] : false;
        }
    }
    // If not Layout tab, don't touch these fields - preserve existing values
    
    return $sanitized;
}
add_filter( 'versana_sanitize_options', 'versana_companion_sanitize_layout_options', 10, 2 );