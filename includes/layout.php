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
    // Get current options
    $options = versana_get_all_options();
    $show_page_titles = isset( $options['show_page_titles'] ) ? $options['show_page_titles'] : false;
    ?>
    <div class="versana-tab-content">
        <h3><?php esc_html_e( 'Page Display Options', 'versana-companion' ); ?></h3>
        
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <?php esc_html_e( 'Page Titles', 'versana-companion' ); ?>
                    </th>
                    <td>
                        <fieldset>
                            <label>
                                <input 
                                    type="checkbox" 
                                    name="versana_theme_options[show_page_titles]" 
                                    id="show_page_titles" 
                                    value="1" 
                                    <?php checked( $show_page_titles, 1 ); ?>
                                />
                                <?php esc_html_e( 'Show page titles', 'versana-companion' ); ?>
                            </label>
                            <p class="description">
                                <?php esc_html_e( 'Display page titles at the top of all pages. Uncheck to hide titles site-wide (useful when adding custom titles in page content).', 'versana-companion' ); ?>
                            </p>
                        </fieldset>
                    </td>
                </tr>

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
 * Add default value for show_page_titles option
 */
function versana_companion_add_layout_defaults( $defaults ) {
    $defaults['show_page_titles'] = false; // Default: hidden
    return $defaults;
}
add_filter( 'versana_default_options', 'versana_companion_add_layout_defaults' );

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
        'show_page_titles',
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

/**
 * Hide page titles via CSS when setting is disabled
 */
function versana_companion_hide_page_titles_css() {
    $show_page_titles = versana_get_option( 'show_page_titles', false );
    
    // If disabled, hide page titles
    if ( ! $show_page_titles ) {
        ?>
        <style id="versana-hide-page-titles">
            /* Hide page titles on pages */
            body.page .entry-header,
            body.page h1.wp-block-post-title,
            body.page .entry-title,
            body.page h1.entry-title,
            body.page header.entry-header,
            body.page .page-title,
            body.page article header h1,
            body.single-page .entry-title,
            
            /* Block editor specific */
            body.page h1.wp-block-post-title,
            body.page .entry-content > h1:first-child,
            
            /* Common theme patterns */
            .page-header .page-title,
            article.page .entry-header .entry-title,
            .type-page .entry-title,
            
            /* Versana specific */
            body.page .wp-block-template-part header h1,
            body.page main > h1:first-child {
                display: none !important;
            }
            
            /* Adjust spacing when title is hidden */
            body.page .entry-header,
            body.page header.entry-header {
                margin-bottom: 0 !important;
                padding-bottom: 0 !important;
            }
            
            /* Ensure first content element gets proper spacing */
            body.page .entry-content > *:first-child,
            body.page main > *:first-child {
                margin-top: 0 !important;
            }
        </style>
        <?php
    }
}
add_action( 'wp_head', 'versana_companion_hide_page_titles_css', 100 );