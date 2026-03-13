<?php
/**
 * Versana Premium Features - Integrated into Existing Tabs
 *
 * Adds premium feature toggles to existing theme option tabs
 * Features are locked if PRO license is not active
 *
 * @package Versana Companion
 * @since 1.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

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
                <?php
                $is_pro_active = versana_companion_is_pro_active();
                ?>
                <!-- Premium Features Section in Optimizations -->
                <tr>
                    <th colspan="2" style="padding: 30px 0 0 0;">
                        <h3 style="margin: 0; padding: 20px 0 10px 0; border-top: 2px solid #ddd; border-bottom: 2px solid #1A73E8;">
                            ⚡ <?php esc_html_e( 'PRO Performance Features', 'versana-companion' ); ?>
                        </h3>
                        <?php if ( ! $is_pro_active ) : ?>
                            <p class="description" style="color: #d63638; font-weight: 500;">
                                🔒 <?php esc_html_e( 'These features require an active PRO license.', 'versana-companion' ); ?>
                                <a href="<?php echo esc_url( admin_url( 'admin.php?page=versana-options&tab=license' ) ); ?>">
                                    <?php esc_html_e( 'Activate License', 'versana-companion' ); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </th>
                </tr>
                
                <?php versana_premium_feature_toggle(
                    'premium_advanced_lazy_load',
                    __( 'Advanced Lazy Loading', 'versana-companion' ),
                    __( 'Enhanced lazy loading with fade-in effects, blur-up technique, and placeholder images for better UX.', 'versana-companion' ),
                    $is_pro_active
                ); ?>
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
            </tbody>
        </table>
        
    </div>
    <?php
}

/**
 * Add default values for premium features
 */
function versana_premium_features_add_defaults( $defaults ) {
    // Optimizations Tab Features
    $defaults['premium_advanced_lazy_load']     = false;
    
    // Layout Tab Features
    $defaults['premium_breadcrumbs']            = false;
    $defaults['premium_reading_progress']       = false;
    $defaults['premium_related_posts']          = false;
    
    return $defaults;
}
add_filter( 'versana_default_options', 'versana_premium_features_add_defaults' );


/**
 * Sanitize optimization options (tab-aware) - FIXED VERSION
 *
 * @param array $sanitized Sanitized options array
 * @param array $input Raw input array
 * @return array Modified sanitized options
 */
function versana_optimizations_sanitize( $sanitized, $input ) {
    // Define all optimization option keys
    $optimization_keys = array(
        'premium_advanced_lazy_load'
    );
    /**
     * CRITICAL FIX: Check the hidden active_tab field first (most reliable)
     */
    $is_optimizations_tab = false;
    
    // Primary detection: explicit tab identifier
    if ( isset( $input['active_tab'] ) && $input['active_tab'] === 'optimizations' ) {
        $is_optimizations_tab = true;
    }
    
    // Fallback detection: check if ANY optimization field exists in input
    // (for backward compatibility if hidden field is missing)
    if ( ! $is_optimizations_tab && ! isset( $input['active_tab'] ) ) {
        foreach ( $optimization_keys as $key ) {
            if ( array_key_exists( $key, $input ) ) {
                $is_optimizations_tab = true;
                break;
            }
        }
    }
    
    // Only process optimization fields when Optimizations tab is being saved
    if ( $is_optimizations_tab ) {
        foreach ( $optimization_keys as $key ) {
            // CRITICAL: Checkboxes are false if not in input (unchecked)
            $sanitized[ $key ] = isset( $input[ $key ] ) ? (bool) $input[ $key ] : false;
        }
    }
    // If not Optimizations tab, don't touch these fields - preserve existing values
    
    return $sanitized;
}
add_filter( 'versana_sanitize_options', 'versana_optimizations_sanitize', 20, 2 );

/**
 * Add premium features to Layout tab
 */
function versana_premium_features_layout_tab() {
    $is_pro_active = versana_companion_is_pro_active();
    ?>
    
    <!-- Premium Features Section in Layout -->
    <tr>
        <th colspan="2" style="padding: 30px 0 0 0;">
            <h3 style="margin: 0; padding: 20px 0 10px 0; border-top: 2px solid #ddd; border-bottom: 2px solid #1A73E8;">
                🎨 <?php esc_html_e( 'PRO Layout Features', 'versana-companion' ); ?>
            </h3>
            <?php if ( ! $is_pro_active ) : ?>
                <p class="description" style="color: #d63638; font-weight: 500;">
                    🔒 <?php esc_html_e( 'These features require an active PRO license.', 'versana-companion' ); ?>
                    <a href="<?php echo esc_url( admin_url( 'admin.php?page=versana-options&tab=license' ) ); ?>">
                        <?php esc_html_e( 'Activate License', 'versana-companion' ); ?>
                    </a>
                </p>
            <?php endif; ?>
        </th>
    </tr>
    
    <?php versana_premium_feature_toggle(
        'premium_breadcrumbs',
        __( 'Advanced Breadcrumbs', 'versana-companion' ),
        __( 'Automatic breadcrumb navigation with schema markup for blog posts. Improves navigation and SEO.', 'versana-companion' ),
        $is_pro_active
    ); ?>
    
    <?php versana_premium_feature_toggle(
        'premium_reading_progress',
        __( 'Reading Progress Bar', 'versana-companion' ),
        __( 'Show reading progress indicator at top of page. Provides visual feedback for long articles.', 'versana-companion' ),
        $is_pro_active
    ); ?>

    <?php versana_premium_feature_toggle(
        'premium_related_posts',
        __( 'Related Posts', 'versana-companion' ),
        __( 'Automatically show related posts by category/tags at the end of articles. Increases engagement and page views.', 'versana-companion' ),
        $is_pro_active
    ); ?>
    
    <?php
}
add_action( 'versana_layout_tab_settings', 'versana_premium_features_layout_tab', 20 );

/**
 * Helper function to render a feature toggle
 *
 * @param string $key Feature option key
 * @param string $label Feature label
 * @param string $description Feature description
 * @param bool $is_unlocked Whether PRO license is active
 */
function versana_premium_feature_toggle( $key, $label, $description, $is_unlocked = false ) {
    $value = versana_get_option( $key, false );
    $row_class = $is_unlocked ? '' : 'versana-feature-locked';
    ?>
    <tr class="<?php echo esc_attr( $row_class ); ?>">
        <th scope="row">
            <?php echo esc_html( $label ); ?>
        </th>
        <td>
            <label>
                <input 
                    type="checkbox" 
                    name="versana_theme_options[<?php echo esc_attr( $key ); ?>]" 
                    value="1" 
                    <?php checked( $value, 1 ); ?>
                    <?php disabled( ! $is_unlocked ); ?>
                />
                <?php esc_html_e( 'Enable this feature', 'versana-companion' ); ?>
            </label>
            <p class="description">
                <?php echo esc_html( $description ); ?>
            </p>
        </td>
    </tr>
    <?php
}

/**
 * Add premium feature styles to all tabs
 */
function versana_premium_features_styles() {
    ?>
    <style>
        .versana-feature-locked {
            opacity: 0.5;
            pointer-events: none;
            position: relative;
        }
        .versana-feature-locked::after {
            content: '🔒 PRO';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: #ff9800;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 700;
        }
    </style>
    <?php
}
add_action( 'admin_head', 'versana_premium_features_styles' );

/**
 * Check if a premium feature is enabled
 *
 * This is a helper function for the PRO plugin to check:
 * 1. License is active
 * 2. Feature is enabled in options
 *
 * @param string $feature_key Feature key (e.g., 'premium_advanced_lazy_load')
 * @return bool True if feature should be active
 */
function versana_is_premium_feature_enabled( $feature_key ) {
    // Check license
    if ( ! versana_companion_is_pro_active() ) {
        return false;
    }
    
    // Check if feature is enabled in options
    $enabled = versana_get_option( $feature_key, false );
    
    /**
     * Filter: versana_premium_feature_enabled
     *
     * Allows overriding feature enable status
     *
     * @param bool $enabled Current status
     * @param string $feature_key Feature key
     */
    return apply_filters( 'versana_premium_feature_enabled', $enabled, $feature_key );
}