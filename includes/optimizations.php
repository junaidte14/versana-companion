<?php
/**
 * Versana Optimizations Tab
 *
 * Adds performance optimization options to Versana theme.
 *
 * @package Versana_Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add default value for lazy load images option
 *
 * @param array $defaults Existing default options
 * @return array Modified defaults
 */
function versana_optimizations_add_defaults( $defaults ) {
    $defaults['enable_lazy_load_images'] = true; // Enabled by default
    
    return $defaults;
}
add_filter( 'versana_default_options', 'versana_optimizations_add_defaults' );

/**
 * Add Optimizations tab to theme options
 *
 * @param array $tabs Existing tabs
 * @return array Modified tabs
 */
function versana_optimizations_add_tab( $tabs ) {
    $tabs['optimizations'] = array(
        'title'    => __( 'Optimizations', 'versana-companion' ),
        'icon'     => 'dashicons-performance',
        'callback' => 'versana_optimizations_render_tab',
        'priority' => 50, // Between Blog (40) and Integrations (60)
    );
    
    return $tabs;
}
add_filter( 'versana_option_tabs', 'versana_optimizations_add_tab' );

/**
 * Render Optimizations tab content
 */
function versana_optimizations_render_tab() {
    ?>
    <div class="versana-tab-content">
        <h2><?php esc_html_e( 'Performance Optimizations', 'versana-companion' ); ?></h2>
        <p class="description">
            <?php esc_html_e( 'Configure performance optimization settings to improve your site speed and user experience.', 'versana-companion' ); ?>
        </p>
        
        <table class="form-table" role="presentation">
            <tbody>
                <!-- Lazy Load Images -->
                <tr>
                    <th scope="row">
                        <?php esc_html_e( 'Lazy Load Images', 'versana-companion' ); ?>
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" 
                                   name="versana_theme_options[enable_lazy_load_images]" 
                                   value="1" 
                                   <?php checked( versana_get_option( 'enable_lazy_load_images', true ), true ); ?> />
                            <?php esc_html_e( 'Enable lazy loading for images', 'versana-companion' ); ?>
                        </label>
                        <p class="description">
                            <?php esc_html_e( 'Images will only load when they are about to enter the viewport, improving initial page load time. Uses native WordPress lazy loading functionality.', 'versana-companion' ); ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php
        /**
         * Extensibility Hook: Add custom optimization settings
         *
         * Allows other plugins to add more optimization options
         *
         * @since 1.0.0
         */
        do_action( 'versana_optimizations_tab_settings' );
        ?>
    </div>
    <?php
}

/**
 * Sanitize optimization options
 *
 * @param array $sanitized Sanitized options array
 * @param array $input Raw input array
 * @return array Modified sanitized options
 */
function versana_optimizations_sanitize( $sanitized, $input ) {
    // Check if we're saving the Optimizations tab
    // We can detect this by checking if our field exists in the input
    // or if no other tab-specific fields exist
    $is_optimizations_tab = ! isset( $input['header_layout'] ) && 
                            ! isset( $input['footer_copyright'] ) && 
                            ! isset( $input['blog_layout'] ) &&
                            ! isset( $input['google_analytics_id'] ) &&
                            ! isset( $input['custom_css'] );
    
    // Only update our boolean if we're on the Optimizations tab
    if ( $is_optimizations_tab ) {
        $sanitized['enable_lazy_load_images'] = isset( $input['enable_lazy_load_images'] ) ? (bool) $input['enable_lazy_load_images'] : false;
    }
    
    return $sanitized;
}
add_filter( 'versana_sanitize_options', 'versana_optimizations_sanitize', 10, 2 );

/**
 * Control WordPress native lazy loading based on option
 *
 * @param bool   $default Default lazy loading state
 * @param string $tag_name Tag name (img, iframe)
 * @param string $context Context (the_content, wp_get_attachment_image, etc)
 * @return bool Whether to enable lazy loading
 */
function versana_optimizations_control_lazy_loading( $default, $tag_name, $context ) {
    // Get the option value
    $lazy_load_enabled = versana_get_option( 'enable_lazy_load_images', true );
    
    // If lazy loading is disabled in options, return false
    if ( ! $lazy_load_enabled ) {
        return false;
    }
    
    // Otherwise, return the default WordPress behavior
    return $default;
}
add_filter( 'wp_lazy_loading_enabled', 'versana_optimizations_control_lazy_loading', 10, 3 );

/**
 * Admin notice if Versana theme is not active
 */
function versana_optimizations_check_theme() {
    // Only check on admin pages
    if ( ! is_admin() ) {
        return;
    }
    
    // Check if versana_get_option function exists
    if ( ! function_exists( 'versana_get_option' ) ) {
        add_action( 'admin_notices', 'versana_optimizations_theme_notice' );
    }
}
add_action( 'admin_init', 'versana_optimizations_check_theme' );

/**
 * Display admin notice if Versana theme is not active
 */
function versana_optimizations_theme_notice() {
    ?>
    <div class="notice notice-warning">
        <p>
            <strong><?php esc_html_e( 'Versana Optimizations:', 'versana-companion' ); ?></strong>
            <?php esc_html_e( 'This plugin requires the Versana theme to be active. Please activate the Versana theme to use optimization features.', 'versana-companion' ); ?>
        </p>
    </div>
    <?php
}