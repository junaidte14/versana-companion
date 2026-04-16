<?php
/**
 * Versana Advanced Features
 *
 * Adds optional feature toggles to the Content & Layout and Optimizations
 * theme-options tabs. Every toggle is fully functional and free to use —
 * nothing is locked or disabled in this plugin.
 *
 * The Versana PRO plugin may add further features via WordPress action hooks.
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ---------------------------------------------------------------------------
// Optimizations tab
// ---------------------------------------------------------------------------

/**
 * Register the Optimizations tab.
 *
 * @param array $tabs
 * @return array
 */
function versana_optimizations_add_tab( $tabs ) {
    $tabs['optimizations'] = array(
        'title'    => __( 'Optimizations', 'versana-companion' ),
        'icon'     => 'dashicons-performance',
        'callback' => 'versana_optimizations_render_tab',
        'priority' => 50,
    );
    return $tabs;
}
add_filter( 'versana_option_tabs', 'versana_optimizations_add_tab' );

/**
 * Render the Optimizations tab.
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

                <?php versana_feature_toggle(
                    'premium_advanced_lazy_load',
                    __( 'Advanced Lazy Loading', 'versana-companion' ),
                    __( 'Enhanced advanced image lazy loading for better perceived performance.', 'versana-companion' )
                ); ?>

                <?php
                /**
                 * Action: versana_optimizations_tab_settings
                 *
                 * Allows the Versana PRO plugin or other add-ons to inject
                 * additional optimization settings rows.
                 *
                 * @since 1.0.0
                 */
                do_action( 'versana_optimizations_tab_settings' );
                ?>

            </tbody>
        </table>

        <?php versana_companion_pro_upsell_inline( VERSANA_PRO_PURCHASE_URL, __( 'More performance features — including advanced caching controls, font optimization, and critical CSS — are available in Versana PRO.', 'versana-companion' ) ); ?>

    </div>
    <?php
}

// ---------------------------------------------------------------------------
// Layout tab — injected via action hook
// ---------------------------------------------------------------------------

/**
 * Inject layout-related feature toggles into the Content & Layout tab.
 */
function versana_premium_features_layout_tab() {
    ?>
    <tr>
        <th colspan="2">
            <h3>
                🎨 <?php esc_html_e( 'Layout Features', 'versana-companion' ); ?>
            </h3>
        </th>
    </tr>

    <?php versana_feature_toggle(
        'premium_breadcrumbs',
        __( 'Advanced Breadcrumbs', 'versana-companion' ),
        __( 'Automatic breadcrumb navigation with schema markup for blog posts. Improves navigation and SEO.', 'versana-companion' )
    ); ?>

    <?php versana_feature_toggle(
        'premium_reading_progress',
        __( 'Reading Progress Bar', 'versana-companion' ),
        __( 'Show a reading progress indicator at the top of the page. Provides visual feedback for long articles.', 'versana-companion' )
    ); ?>

    <?php versana_feature_toggle(
        'premium_related_posts',
        __( 'Related Posts', 'versana-companion' ),
        __( 'Automatically show related posts by category/tags at the end of articles to increase engagement.', 'versana-companion' )
    ); ?>

    <tr>
        <td colspan="2">
            <?php versana_companion_pro_upsell_inline( VERSANA_PRO_PURCHASE_URL, __( 'Additional layout features such as mega-menus, sticky sidebars, and custom post layouts are available in Versana PRO.', 'versana-companion' ) ); ?>
        </td>
    </tr>

    <?php
}
add_action( 'versana_layout_tab_settings', 'versana_premium_features_layout_tab', 20 );

// ---------------------------------------------------------------------------
// Defaults & sanitization
// ---------------------------------------------------------------------------

/**
 * Register default option values for feature toggles.
 *
 * @param array $defaults
 * @return array
 */
function versana_premium_features_add_defaults( $defaults ) {
    $defaults['premium_advanced_lazy_load'] = false;
    $defaults['premium_breadcrumbs']        = false;
    $defaults['premium_reading_progress']   = false;
    $defaults['premium_related_posts']      = false;
    return $defaults;
}
add_filter( 'versana_default_options', 'versana_premium_features_add_defaults' );

/**
 * Sanitize Optimizations-tab options.
 *
 * @param array $sanitized
 * @param array $input
 * @return array
 */
function versana_optimizations_sanitize( $sanitized, $input ) {
    $keys = array( 'premium_advanced_lazy_load' );

    $is_tab = isset( $input['active_tab'] ) && 'optimizations' === $input['active_tab'];

    // Fallback: if no active_tab field, detect by presence of any key.
    if ( ! $is_tab && ! isset( $input['active_tab'] ) ) {
        foreach ( $keys as $key ) {
            if ( array_key_exists( $key, $input ) ) {
                $is_tab = true;
                break;
            }
        }
    }

    if ( $is_tab ) {
        foreach ( $keys as $key ) {
            $sanitized[ $key ] = isset( $input[ $key ] ) ? (bool) $input[ $key ] : false;
        }
    }

    return $sanitized;
}
add_filter( 'versana_sanitize_options', 'versana_optimizations_sanitize', 20, 2 );

// ---------------------------------------------------------------------------
// Shared UI helpers
// ---------------------------------------------------------------------------

/**
 * Render a single feature toggle <tr>.
 *
 * All toggles are fully enabled — no license check.
 *
 * @param string $key         Option key stored in versana_theme_options[].
 * @param string $label       Human-readable label.
 * @param string $description Explanatory text shown below the checkbox.
 */
function versana_feature_toggle( $key, $label, $description ) {
    $value = versana_get_option( $key, false );
    ?>
    <tr>
        <th scope="row"><?php echo esc_html( $label ); ?></th>
        <td>
            <label>
                <input
                    type="checkbox"
                    name="versana_theme_options[<?php echo esc_attr( $key ); ?>]"
                    value="1"
                    <?php checked( $value, 1 ); ?>
                />
                <?php esc_html_e( 'Enable', 'versana-companion' ); ?>
            </label>
            <p class="description"><?php echo esc_html( $description ); ?></p>
        </td>
    </tr>
    <?php
}

/**
 * Backward-compatible alias so any existing code calling the old function
 * name does not fatal-error. The `$is_unlocked` parameter is ignored —
 * features are always enabled in this plugin.
 *
 * @deprecated Use versana_feature_toggle() directly.
 *
 * @param string $key
 * @param string $label
 * @param string $description
 * @param bool   $is_unlocked Ignored.
 */
function versana_premium_feature_toggle( $key, $label, $description, $is_unlocked = true ) {
    versana_feature_toggle( $key, $label, $description );
}

/**
 * Render a compact PRO upsell notice (inline, not a modal).
 *
 * This is purely informational — it describes what the separate Versana PRO
 * plugin offers and links to the purchase page.
 *
 * @param string $purchase_url URL to the PRO purchase/info page.
 * @param string $message      Sentence describing what PRO adds.
 */
function versana_companion_pro_upsell_inline( $purchase_url, $message ) {
    ?>
    <div class="versana-pro-upsell-notice">
        <span class="dashicons dashicons-star-filled" style="color:#f0b429;vertical-align:middle;margin-right:6px;"></span>
        <strong><?php esc_html_e( 'Versana PRO:', 'versana-companion' ); ?></strong>
        <?php echo esc_html( $message ); ?>
        <a href="<?php echo esc_url( $purchase_url ); ?>"
           target="_blank"
           rel="noopener noreferrer"
           style="margin-left:8px;">
            <?php esc_html_e( 'Learn more →', 'versana-companion' ); ?>
        </a>
    </div>
    <?php
}

// ---------------------------------------------------------------------------
// Public API
// ---------------------------------------------------------------------------

/**
 * Check whether a specific feature toggle is enabled.
 *
 * Used by the theme and any add-ons to conditionally activate functionality.
 *
 * @param string $feature_key Option key (e.g. 'premium_advanced_lazy_load').
 * @return bool
 */
function versana_is_premium_feature_enabled( $feature_key ) {
    $enabled = versana_get_option( $feature_key, false );

    /**
     * Filter: versana_premium_feature_enabled
     *
     * @param bool   $enabled     Whether the option is checked.
     * @param string $feature_key The option key being checked.
     * @return bool
     */
    return (bool) apply_filters( 'versana_premium_feature_enabled', $enabled, $feature_key );
}