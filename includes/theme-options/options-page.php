<?php
/**
 * Versana Theme Options Admin Page
 *
 * V1.0.0 Simplified - Core Features Only
 *
 * @package Versana
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add theme options page to admin menu
 */
function versana_add_theme_options_page() {
    add_theme_page(
        __( 'Versana Theme Options', 'versana' ),
        __( 'Versana Options', 'versana' ),
        'edit_theme_options',
        'versana-options',
        'versana_render_options_page',
        2
    );
}
add_action( 'admin_menu', 'versana_add_theme_options_page' );

/**
 * Render the main options page
 */
function versana_render_options_page() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die( __( 'You do not have sufficient permissions to access this page.', 'versana' ) );
    }
    
    // Get registered tabs
    $tabs = versana_get_option_tabs();
    
    // Get active tab
    $active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';
    
    // Default to first tab if invalid
    if ( ! isset( $tabs[ $active_tab ] ) ) {
        $active_tab = array_key_first( $tabs );
    }
    
    ?>
    <div class="wrap versana-options-wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        
        <div class="versana-options-header">
            <div class="versana-header-info">
                <p class="description">
                    <?php esc_html_e( 'For header layouts, footer and blog layouts, use the Customizer settings. For design customization (colors, typography, spacing), use the Site Editor.', 'versana' ); ?>
                </p>
                
                <div class="versana-quick-links">
                    <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary">
                        <span class="dashicons dashicons-admin-customizer"></span>
                        <?php esc_html_e( 'Open Customizer', 'versana' ); ?>
                    </a>

                    <a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" class="button button-primary">
                        <span class="dashicons dashicons-admin-appearance"></span>
                        <?php esc_html_e( 'Open Site Editor', 'versana' ); ?>
                    </a>
                    
                    <a href="<?php echo esc_url( admin_url( 'site-editor.php?path=/patterns' ) ); ?>" class="button">
                        <span class="dashicons dashicons-screenoptions"></span>
                        <?php esc_html_e( 'Manage Patterns', 'versana' ); ?>
                    </a>
                </div>
            </div>
        </div>
        
        <?php settings_errors(); ?>
        
        <!-- Dynamic Tab Navigation -->
        <h2 class="nav-tab-wrapper">
            <?php foreach ( $tabs as $tab_key => $tab_config ) : ?>
                <a href="?page=versana-options&tab=<?php echo esc_attr( $tab_key ); ?>" 
                   class="nav-tab <?php echo $active_tab === $tab_key ? 'nav-tab-active' : ''; ?>">
                    <?php if ( ! empty( $tab_config['icon'] ) ) : ?>
                        <span class="dashicons <?php echo esc_attr( $tab_config['icon'] ); ?>"></span>
                    <?php endif; ?>
                    <?php echo esc_html( $tab_config['title'] ); ?>
                </a>
            <?php endforeach; ?>
        </h2>
        
        <!-- Tab Content -->
        <form method="post" action="options.php" id="versana-theme-options">
            <?php
            settings_fields( 'versana_options' );
            
            // CRITICAL: Add nonce field for security
            wp_nonce_field( 'versana_save_options', 'versana_options_nonce' );
            
            // Render active tab
            if ( isset( $tabs[ $active_tab ]['callback'] ) && is_callable( $tabs[ $active_tab ]['callback'] ) ) {
                /**
                 * Action before tab content
                 *
                 * @param string $active_tab Current active tab
                 */
                do_action( 'versana_before_tab_content', $active_tab );
                
                call_user_func( $tabs[ $active_tab ]['callback'] );
                
                /**
                 * Action after tab content
                 *
                 * @param string $active_tab Current active tab
                 */
                do_action( 'versana_after_tab_content', $active_tab );
            } else {
                echo '<div class="notice notice-error"><p>' . esc_html__( 'Tab callback not found.', 'versana' ) . '</p></div>';
            }
            
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Render Integrations tab - V1.0.0
 */
function versana_render_integrations_tab() {
    ?>
    <div class="versana-tab-content">
        <h2><?php esc_html_e( 'Third-Party Integrations', 'versana' ); ?></h2>
        <p class="description">
            <?php esc_html_e( 'Connect your site with third-party services.', 'versana' ); ?>
        </p>
        
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="google_analytics_id">
                            <?php esc_html_e( 'Google Analytics', 'versana' ); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" 
                               id="google_analytics_id" 
                               name="versana_theme_options[google_analytics_id]" 
                               value="<?php echo esc_attr( versana_get_option( 'google_analytics_id' ) ); ?>" 
                               class="regular-text" 
                               placeholder="<?php esc_attr_e( 'G-XXXXXXXXXX or UA-XXXXXX-X', 'versana' ); ?>" />
                        <p class="description">
                            <?php esc_html_e( 'Enter your Google Analytics Measurement ID or Tracking ID.', 'versana' ); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="google_tag_manager_id">
                            <?php esc_html_e( 'Google Tag Manager', 'versana' ); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" 
                               id="google_tag_manager_id" 
                               name="versana_theme_options[google_tag_manager_id]" 
                               value="<?php echo esc_attr( versana_get_option( 'google_tag_manager_id' ) ); ?>" 
                               class="regular-text" 
                               placeholder="<?php esc_attr_e( 'GTM-XXXXXX', 'versana' ); ?>" />
                        <p class="description">
                            <?php esc_html_e( 'Enter your Google Tag Manager container ID.', 'versana' ); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="facebook_pixel_id">
                            <?php esc_html_e( 'Facebook Pixel', 'versana' ); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" 
                               id="facebook_pixel_id" 
                               name="versana_theme_options[facebook_pixel_id]" 
                               value="<?php echo esc_attr( versana_get_option( 'facebook_pixel_id' ) ); ?>" 
                               class="regular-text" 
                               placeholder="<?php esc_attr_e( 'XXXXXXXXXXXXXXXX', 'versana' ); ?>" />
                        <p class="description">
                            <?php esc_html_e( 'Enter your Facebook Pixel ID for conversion tracking.', 'versana' ); ?>
                        </p>
                    </td>
                </tr>
                
                <?php if ( current_user_can( 'unfiltered_html' ) ) : ?>
                <tr>
                    <th scope="row">
                        <label for="header_scripts">
                            <?php esc_html_e( 'Header Scripts', 'versana' ); ?>
                        </label>
                    </th>
                    <td>
                        <textarea id="header_scripts" 
                                  name="versana_theme_options[header_scripts]" 
                                  rows="5" 
                                  class="large-text code"><?php echo esc_textarea( versana_get_option( 'header_scripts' ) ); ?></textarea>
                        <p class="description">
                            <?php esc_html_e( 'Scripts added here will be inserted into the <head> section. Include <script> tags.', 'versana' ); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="footer_scripts">
                            <?php esc_html_e( 'Footer Scripts', 'versana' ); ?>
                        </label>
                    </th>
                    <td>
                        <textarea id="footer_scripts" 
                                  name="versana_theme_options[footer_scripts]" 
                                  rows="5" 
                                  class="large-text code"><?php echo esc_textarea( versana_get_option( 'footer_scripts' ) ); ?></textarea>
                        <p class="description">
                            <?php esc_html_e( 'Scripts added here will be inserted before </body>. Include <script> tags.', 'versana' ); ?>
                        </p>
                    </td>
                </tr>
                <?php else : ?>
                <tr>
                    <th scope="row">
                        <?php esc_html_e( 'Custom Scripts', 'versana' ); ?>
                    </th>
                    <td>
                        <p class="description">
                            <?php esc_html_e( 'Custom script fields are only available to administrators for security reasons.', 'versana' ); ?>
                        </p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="versana-reset-section">
            <h3><?php esc_html_e( 'Reset Options', 'versana' ); ?></h3>
            <p class="description">
                <?php esc_html_e( 'Reset all theme options to their default values. This action cannot be undone.', 'versana' ); ?>
            </p>
            <button type="button" class="button button-secondary versana-reset-options">
                <?php esc_html_e( 'Reset to Defaults', 'versana' ); ?>
            </button>
        </div>
        
        <?php
        /**
         * Extensibility Hook: Add custom integration settings
         *
         * @since 1.0.0
         */
        do_action( 'versana_integrations_tab_settings' );
        ?>
    </div>
    <?php
}