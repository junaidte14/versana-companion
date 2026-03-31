<?php
/**
 * Versana Companion – PRO Information Tab
 *
 * The free Companion plugin does not handle license keys or activation.
 * That functionality lives entirely in the separate Versana PRO plugin.
 *
 * This file only adds an informational "Get PRO" tab to the theme options
 * page so users can discover and purchase Versana PRO from within the
 * WordPress admin.
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ---------------------------------------------------------------------------
// PRO info tab
// ---------------------------------------------------------------------------

/**
 * Register the "Versana PRO" informational tab.
 *
 * @param array $tabs
 * @return array
 */
function versana_companion_add_pro_info_tab( $tabs ) {
    // If the PRO plugin is active it will remove this stub tab and replace it
    // with its own license-management tab via this same filter.
    if ( versana_companion_is_pro_active() ) {
        return $tabs;
    }

    $tabs['pro_info'] = array(
        'title'    => __( 'Versana PRO', 'versana-companion' ),
        'icon'     => 'dashicons-star-filled',
        'callback' => 'versana_companion_render_pro_info_tab',
        'priority' => 80,
    );

    return $tabs;
}
add_filter( 'versana_option_tabs', 'versana_companion_add_pro_info_tab' );

/**
 * Render the PRO info tab content.
 */
function versana_companion_render_pro_info_tab() {
    $pro_url = VERSANA_PRO_PURCHASE_URL;
    ?>
    <div class="versana-tab-content">
        <h2><?php esc_html_e( 'Upgrade to Versana PRO', 'versana-companion' ); ?></h2>
        <p><?php esc_html_e( 'Versana PRO is a separate plugin that extends this companion plugin with premium starter templates, advanced layout features, and priority support.', 'versana-companion' ); ?></p>
        <!-- Feature list -->
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><?php esc_html_e( 'Premium Demo Templates', 'versana-companion' ); ?></th>
                    <td>
                        <p><?php esc_html_e( 'Import Restaurant, Fitness, Real Estate, WooCommerce Store, and Premium Shop starter sites with one click.', 'versana-companion' ); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e( 'Advanced Performance', 'versana-companion' ); ?></th>
                    <td>
                        <p><?php esc_html_e( 'Font optimization, advanced image optimizations, and more.', 'versana-companion' ); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e( 'Advanced Layout', 'versana-companion' ); ?></th>
                    <td>
                        <p><?php esc_html_e( 'Mega-menus, advanced pricing tables, auto popup, and more premium blocks.', 'versana-companion' ); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e( 'Priority Support', 'versana-companion' ); ?></th>
                    <td>
                        <p><?php esc_html_e( 'Get faster responses and dedicated help from the Versana development team.', 'versana-companion' ); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top:30px;padding-top:20px;border-top:1px solid #ddd;">
            <a href="<?php echo esc_url( $pro_url ); ?>"
               class="button button-primary button-large"
               target="_blank"
               rel="noopener noreferrer">
                <span class="dashicons dashicons-cart" style="margin-top:4px;"></span>
                <?php esc_html_e( 'Get Versana PRO', 'versana-companion' ); ?>
            </a>
            <a href="https://versana.codoplex.com/"
               class="button button-large"
               target="_blank"
               rel="noopener noreferrer"
               style="margin-left:10px;">
                <?php esc_html_e( 'View Demo Previews', 'versana-companion' ); ?>
            </a>
        </div>

        <p style="margin-top:20px;color:#646970;">
            <?php esc_html_e( 'Already purchased? Install and activate the Versana PRO plugin. Once activated, this tab will be replaced with the license management screen.', 'versana-companion' ); ?>
        </p>

    </div>
    <?php
}

// ---------------------------------------------------------------------------
// versana_companion_is_pro_active() stub
// ---------------------------------------------------------------------------
// Defined in demos.php with a filter so the PRO plugin can override it.
// We do NOT redefine it here to avoid a fatal "already declared" error.