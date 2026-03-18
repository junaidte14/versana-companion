<?php
/**
 * Versana Theme Options Admin Page
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
        __( 'Versana Theme Options', 'versana-companion' ),
        __( 'Versana Options', 'versana-companion' ),
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
        wp_die( 
            esc_html__( 'You do not have sufficient permissions to access this page.', 'versana-companion' ) 
        );
    }
    
    // Get registered tabs
    $tabs = versana_get_option_tabs();
    
    // 1. Define a default tab
    $active_tab = 'demo_import';
    // 2. Check if a tab is requested and verify the nonce
    if ( isset( $_GET['tab'] ) ) {
        // 1. Get the nonce, unslash it, and sanitize it explicitly
        $nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ) : '';

        // 2. Verify the sanitized nonce
        if ( ! empty( $nonce ) && wp_verify_nonce( $nonce, 'versana_tab_switch' ) ) {
            $active_tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) );
        } else {
            // If nonce fails, show an error
            wp_die( esc_html__( 'Security check failed. Please refresh the page.', 'versana-companion' ) );
        }
    }
    
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
                    <?php esc_html_e( 'For header layouts, footer and blog layouts, use the Customizer settings. For design customization (colors, typography, spacing), use the Site Editor.', 'versana-companion' ); ?>
                </p>
                
                <div class="versana-quick-links">
                    <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary">
                        <span class="dashicons dashicons-admin-customizer"></span>
                        <?php esc_html_e( 'Open Customizer', 'versana-companion' ); ?>
                    </a>

                    <a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" class="button button-primary">
                        <span class="dashicons dashicons-admin-appearance"></span>
                        <?php esc_html_e( 'Open Site Editor', 'versana-companion' ); ?>
                    </a>
                    
                    <a href="<?php echo esc_url( admin_url( 'site-editor.php?path=/patterns' ) ); ?>" class="button">
                        <span class="dashicons dashicons-screenoptions"></span>
                        <?php esc_html_e( 'Manage Patterns', 'versana-companion' ); ?>
                    </a>
                </div>
            </div>
        </div>
        
        <?php settings_errors(); ?>
        
        <!-- Dynamic Tab Navigation -->
        <h2 class="nav-tab-wrapper">
            <?php foreach ( $tabs as $tab_key => $tab_config ) : 
                // Generate a secure URL for each tab to satisfy security requirements
                $tab_url = wp_nonce_url( 
                    admin_url( 'themes.php?page=versana-options&tab=' . $tab_key ), 
                    'versana_tab_switch' 
                );
                ?>
                <a href="<?php echo esc_url( $tab_url ); ?>" 
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

            echo '<input type="hidden" name="versana_theme_options[active_tab]" value="' . esc_attr( $active_tab ) . '">';
            
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
                echo '<div class="notice notice-error"><p>' . esc_html__( 'Tab callback not found.', 'versana-companion' ) . '</p></div>';
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
        <h2><?php esc_html_e( 'Third-Party Integrations', 'versana-companion' ); ?></h2>
        <p class="description">
            <?php esc_html_e( 'Connect your site with third-party services by adding their scripts.', 'versana-companion' ); ?>
        </p>
        
        <table class="form-table" role="presentation">
            <tbody>
                
                <?php if ( current_user_can( 'unfiltered_html' ) ) : ?>
                <tr>
                    <th scope="row">
                        <label for="header_scripts">
                            <?php esc_html_e( 'Header Scripts', 'versana-companion' ); ?>
                        </label>
                    </th>
                    <td>
                        <textarea id="header_scripts" 
                                  name="versana_theme_options[header_scripts]" 
                                  rows="5" 
                                  class="large-text code"><?php echo esc_textarea( versana_get_option( 'header_scripts' ) ); ?></textarea>
                        <p class="description">
                            <?php esc_html_e( 'Scripts added here will be inserted into the <head> section. Include <script> tags.', 'versana-companion' ); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="footer_scripts">
                            <?php esc_html_e( 'Footer Scripts', 'versana-companion' ); ?>
                        </label>
                    </th>
                    <td>
                        <textarea id="footer_scripts" 
                                  name="versana_theme_options[footer_scripts]" 
                                  rows="5" 
                                  class="large-text code"><?php echo esc_textarea( versana_get_option( 'footer_scripts' ) ); ?></textarea>
                        <p class="description">
                            <?php esc_html_e( 'Scripts added here will be inserted before </body>. Include <script> tags.', 'versana-companion' ); ?>
                        </p>
                    </td>
                </tr>
                <?php else : ?>
                <tr>
                    <th scope="row">
                        <?php esc_html_e( 'Custom Scripts', 'versana-companion' ); ?>
                    </th>
                    <td>
                        <p class="description">
                            <?php esc_html_e( 'Custom script fields are only available to administrators for security reasons.', 'versana-companion' ); ?>
                        </p>
                    </td>
                </tr>
                <?php endif; ?>

                <?php
                    /**
                     * Extensibility Hook: Add custom integration settings
                     *
                     * @since 1.0.0
                     */
                    do_action( 'versana_integrations_tab_settings' );
                ?>
            </tbody>
        </table>

        <div class="versana-reset-section">
            <h3><?php esc_html_e( 'Reset Options', 'versana-companion' ); ?></h3>
            <p class="description">
                <?php esc_html_e( 'Reset all theme options to their default values. This action cannot be undone.', 'versana-companion' ); ?>
            </p>
            <button type="button" class="button button-secondary versana-reset-options">
                <?php esc_html_e( 'Reset to Defaults', 'versana-companion' ); ?>
            </button>
        </div>
    </div>
    <?php
}