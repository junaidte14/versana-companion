<?php
/**
 * License verification for Versana Companion - PRODUCTION READY
 * Integrated with Versana Theme Options
 * 
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'VERSANA_LICENSE_DISABLE_CACHE' ) ) {
    define('VERSANA_LICENSE_DISABLE_CACHE', false);
}

/**
 * Cache control - Set to false for testing
 * Can be disabled via constant: define('VERSANA_LICENSE_DISABLE_CACHE', true);
 */
function versana_companion_is_cache_enabled() {
    if ( defined( 'VERSANA_LICENSE_DISABLE_CACHE' ) && VERSANA_LICENSE_DISABLE_CACHE ) {
        return false;
    }
    return true;
}

/**
 * Initialize license system
 */
function versana_companion_license_init() {
    // Add license tab to theme options
    add_filter( 'versana_option_tabs', 'versana_companion_add_license_tab' );
    
    // AJAX handlers
    add_action( 'wp_ajax_versana_activate_license', 'versana_companion_ajax_activate_license' );
    add_action( 'wp_ajax_versana_deactivate_license', 'versana_companion_ajax_deactivate_license' );
    add_action( 'wp_ajax_versana_check_license', 'versana_companion_ajax_check_license' );
    
    // Schedule daily license check
    if ( ! wp_next_scheduled( 'versana_daily_license_check' ) ) {
        wp_schedule_event( time(), 'daily', 'versana_daily_license_check' );
    }
    add_action( 'versana_daily_license_check', 'versana_companion_verify_license_status' );
    
    // Check license on plugin load (cached)
    versana_companion_check_license_cache();
}
add_action( 'init', 'versana_companion_license_init' );

/**
 * Get license data with defaults
 * 
 * @return array License data with all fields guaranteed
 */
function versana_companion_get_license_data() {
    $defaults = array(
        'license_key'        => '',
        'license_status'     => 'inactive',
        'license_last_check' => 0,
        'activation_token'   => '',
        'license_type'       => '',
        'status'             => '',
        'max_activations'    => 0,
        'activation_count'   => 0,
        'expires_at'         => null,
        'product_name'       => '',
        'product_slug'       => '',
    );
    
    $options = versana_companion_get_all_options();
    
    $license_data = array(
        'license_key'        => isset( $options['license_key'] ) ? $options['license_key'] : '',
        'license_status'     => isset( $options['license_status'] ) ? $options['license_status'] : 'inactive',
        'license_last_check' => isset( $options['license_last_check'] ) ? $options['license_last_check'] : 0,
        'activation_token'   => isset( $options['activation_token'] ) ? $options['activation_token'] : '',
    );
    
    // Merge stored license_data array
    if ( isset( $options['license_data'] ) && is_array( $options['license_data'] ) ) {
        $license_data = array_merge( $license_data, $options['license_data'] );
    }
    
    return wp_parse_args( $license_data, $defaults );
}

/**
 * Helper function to safely get theme options
 */
function versana_companion_get_option( $key, $default = '' ) {
    if ( function_exists( 'versana_get_option' ) ) {
        return versana_get_option( $key, $default );
    }
    
    $options = get_option( 'versana_theme_options', array() );
    return isset( $options[ $key ] ) ? $options[ $key ] : $default;
}

/**
 * Helper function to safely get all theme options
 */
function versana_companion_get_all_options() {
    if ( function_exists( 'versana_get_all_options' ) ) {
        return versana_get_all_options();
    }
    
    return get_option( 'versana_theme_options', array() );
}

/**
 * Helper function to safely update theme option
 */
function versana_companion_update_option( $key, $value ) {
    if ( function_exists( 'versana_update_option' ) ) {
        return versana_update_option( $key, $value );
    }
    
    $options = get_option( 'versana_theme_options', array() );
    $options[ $key ] = $value;
    return update_option( 'versana_theme_options', $options );
}

/**
 * Add License tab to theme options
 */
function versana_companion_add_license_tab( $tabs ) {
    $tabs['license'] = array(
        'title'    => __( 'License', 'versana-companion' ),
        'icon'     => 'dashicons-admin-network',
        'callback' => 'versana_companion_render_license_tab',
        'priority' => 80,
    );
    
    return $tabs;
}

/**
 * Get license server URL
 */
function versana_companion_get_license_server_url() {
    $server_url = 'https://care.codoplex.com';
    
    if ( defined( 'VERSANA_LICENSE_SERVER_URL' ) ) {
        $server_url = VERSANA_LICENSE_SERVER_URL;
    }
    
    return trailingslashit( $server_url );
}

/**
 * Add default values for license options
 */
function versana_companion_add_license_defaults( $defaults ) {
    $defaults['license_key']        = '';
    $defaults['license_status']     = 'inactive';
    $defaults['license_data']       = array();
    $defaults['license_last_check'] = 0;
    $defaults['activation_token']   = '';
    
    return $defaults;
}
add_filter( 'versana_default_options', 'versana_companion_add_license_defaults' );

/**
 * Sanitize license options
 */
function versana_companion_sanitize_license_options( $sanitized, $input ) {
    if ( isset( $input['license_key'] ) ) {
        $sanitized['license_key'] = sanitize_text_field( $input['license_key'] );
    }
    
    $existing_options = versana_companion_get_all_options();
    
    if ( isset( $existing_options['license_status'] ) ) {
        $sanitized['license_status'] = $existing_options['license_status'];
    }
    
    if ( isset( $existing_options['license_data'] ) ) {
        $sanitized['license_data'] = $existing_options['license_data'];
    }
    
    if ( isset( $existing_options['license_last_check'] ) ) {
        $sanitized['license_last_check'] = $existing_options['license_last_check'];
    }
    
    if ( isset( $existing_options['activation_token'] ) ) {
        $sanitized['activation_token'] = $existing_options['activation_token'];
    }
    
    return $sanitized;
}
add_filter( 'versana_sanitize_options', 'versana_companion_sanitize_license_options', 10, 2 );

/**
 * Render License Tab
 */
function versana_companion_render_license_tab() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    
    $license_data = versana_companion_get_license_data();
    $is_valid = ( 'active' === $license_data['license_status'] );
    ?>
    <div class="versana-tab-content">
        <h3><?php esc_html_e( 'Versana PRO License', 'versana-companion' ); ?></h3>
        
        <div id="versana-license-messages"></div>
        
        <?php if ( $is_valid ) : ?>
            
            <!-- Active License -->
            <div class="notice notice-success">
                <p>
                    <strong><?php esc_html_e( 'Your license is active!', 'versana-companion' ); ?></strong>
                    <?php esc_html_e( 'You have access to all PRO features and demos.', 'versana-companion' ); ?>
                </p>
            </div>
            
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'License Key', 'versana-companion' ); ?></th>
                        <td>
                            <code class="versana-license-key-display"><?php echo esc_html( $license_data['license_key'] ); ?></code>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Status', 'versana-companion' ); ?></th>
                        <td>
                            <span class="versana-status-badge versana-status-active">
                                <?php esc_html_e( 'Active', 'versana-companion' ); ?>
                            </span>
                        </td>
                    </tr>
                    <?php if ( ! empty( $license_data['license_type'] ) ) : ?>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'License Type', 'versana-companion' ); ?></th>
                            <td><?php echo esc_html( ucfirst( $license_data['license_type'] ) ); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if ( ! empty( $license_data['max_activations'] ) ) : ?>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Max Activations', 'versana-companion' ); ?></th>
                            <td>
                                <?php 
                                echo esc_html( $license_data['activation_count'] ) . ' / ' . esc_html( $license_data['max_activations'] );
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if ( ! empty( $license_data['expires_at'] ) ) : ?>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Expires', 'versana-companion' ); ?></th>
                            <td>
                                <?php 
                                echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $license_data['expires_at'] ) ) ); 
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if ( ! empty( $license_data['product_name'] ) ) : ?>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Product', 'versana-companion' ); ?></th>
                            <td><?php echo esc_html( $license_data['product_name'] ); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Last Verified', 'versana-companion' ); ?></th>
                        <td>
                            <?php
                            if ( $license_data['license_last_check'] ) {
                                echo esc_html( human_time_diff( $license_data['license_last_check'], time() ) . ' ago' );
                            } else {
                                esc_html_e( 'Never', 'versana-companion' );
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Actions', 'versana-companion' ); ?></th>
                        <td>
                            <button type="button" class="button" id="versana-check-license">
                                <span class="dashicons dashicons-update"></span>
                                <?php esc_html_e( 'Check License Now', 'versana-companion' ); ?>
                            </button>
                            <a type="button" class="button" id="versana-deactivate-license1" href="https://codoplex.com/contact" target="_blank">
                                <span class="dashicons dashicons-dismiss"></span>
                                <?php esc_html_e( 'Deactivate License', 'versana-companion' ); ?>
                            </a>
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
                do_action( 'versana_pro_license_tab_after' );
            ?>
            
        <?php else : ?>
            
            <!-- Inactive License -->
            <div class="notice notice-warning">
                <p>
                    <strong><?php esc_html_e( 'No active license found.', 'versana-companion' ); ?></strong>
                    <?php esc_html_e( 'Activate your license to access PRO features and demos.', 'versana-companion' ); ?>
                </p>
            </div>
            
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="versana_license_key">
                                <?php esc_html_e( 'License Key', 'versana-companion' ); ?>
                            </label>
                        </th>
                        <td>
                            <input 
                                type="text" 
                                id="versana_license_key" 
                                name="versana_theme_options[license_key]" 
                                value="<?php echo esc_attr( $license_data['license_key'] ); ?>"
                                class="regular-text"
                                placeholder="XXXXXXXX-XXXXXXXX-XXXXXXXX-XXXXXXXX"
                                style="font-family: monospace; letter-spacing: 1px;"
                            />
                            <p class="description">
                                <?php esc_html_e( 'Enter your Versana PRO license key to unlock premium features.', 'versana-companion' ); ?>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Site URL', 'versana-companion' ); ?></th>
                        <td>
                            <code><?php echo esc_html( home_url() ); ?></code>
                            <p class="description">
                                <?php esc_html_e( 'This URL will be activated on your license.', 'versana-companion' ); ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Actions', 'versana-companion' ); ?></th>
                        <td>
                            <button 
                                type="button" 
                                class="button button-primary" 
                                id="versana-activate-license-btn"
                                <?php echo empty( $license_data['license_key'] ) ? 'disabled="disabled"' : ''; ?>
                            >
                                <?php esc_html_e( 'Activate License', 'versana-companion' ); ?>
                            </button>

                            <p class="description">
                                <?php
                                if ( empty( $license_data['license_key'] ) ) {
                                    esc_html_e( 'Enter your license key and click "Save Changes" below before activating the license.', 'versana-companion' );
                                } else {
                                    esc_html_e( 'Click to activate your license key with our server.', 'versana-companion' );
                                }
                                ?>
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
                do_action( 'versana_pro_no_license_tab_after' );
            ?>
            
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                <h4><?php esc_html_e( 'Don\'t have a license?', 'versana-companion' ); ?></h4>
                <p><?php esc_html_e( 'Purchase Versana PRO to unlock premium demos and features.', 'versana-companion' ); ?></p>
                <p>
                    <a href="<?php echo esc_url( versana_companion_get_license_server_url() . 'purchase-versana-pro-license/' ); ?>" 
                       class="button button-primary" 
                       target="_blank">
                        <span class="dashicons dashicons-cart"></span>
                        <?php esc_html_e( 'Purchase Versana PRO', 'versana-companion' ); ?>
                    </a>
                </p>
            </div>
            
        <?php endif; ?>
        
    </div>
    <?php
}

/**
 * Make API request to license server with comprehensive error handling
 */
function versana_companion_license_api_request( $endpoint, $data = array() ) {
    $server_url = versana_companion_get_license_server_url();
    $api_url = $server_url . 'wp-json/versana-licenses/v1/' . ltrim( $endpoint, '/' );
    $site_url = home_url();
    
    $options = versana_companion_get_all_options();
    $license_key = isset( $data['license_key'] ) ? $data['license_key'] : ( isset( $options['license_key'] ) ? $options['license_key'] : '' );
    
    $request_data = array_merge(
        $data,
        array(
            'license_key' => $license_key,
            'site_url'    => $site_url,
        )
    );
    
    // Detect localhost
    $is_localhost = ( 
        strpos( home_url(), 'localhost' ) !== false || 
        strpos( home_url(), '127.0.0.1' ) !== false ||
        strpos( home_url(), '.local' ) !== false ||
        strpos( home_url(), '.test' ) !== false
    );
    
    $response = wp_remote_post(
        $api_url,
        array(
            'body'      => json_encode( $request_data ),
            'headers'   => array(
                'Content-Type' => 'application/json',
            ),
            'timeout'   => 45,
            'sslverify' => ! $is_localhost,
        )
    );
    
    // Handle WP_Error
    if ( is_wp_error( $response ) ) {
        $error_msg = $response->get_error_message();
        return array(
            'success' => false,
            'error'   => 'connection_error',
            'message' => sprintf( 
                /* translators: %s: The specific error message from the server */
                __( 'Connection error: %s', 'versana-companion' ), 
                $error_msg 
            ),
        );
    }
    
    $body = wp_remote_retrieve_body( $response );
    $code = wp_remote_retrieve_response_code( $response );
    
    // Handle empty response
    if ( empty( $body ) ) {
        return array(
            'success' => false,
            'error'   => 'empty_response',
            'message' => __( 'Empty response from license server.', 'versana-companion' ),
        );
    }
    
    // Decode JSON
    $data = json_decode( $body, true );
    
    // Handle invalid JSON
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array(
            'success' => false,
            'error'   => 'invalid_json',
            'message' => __( 'Invalid response format from license server.', 'versana-companion' ),
        );
    }
    
    // Handle non-2xx responses
    if ( $code < 200 || $code >= 300 ) {
        return array(
            'success' => false,
            'error'   => isset( $data['error'] ) ? $data['error'] : 'http_error',
            'message' => isset( $data['message'] ) ? $data['message'] : sprintf( 
                /* translators: %d: The numeric error code (e.g., 404, 500) */
                __( 'Server error (Code: %d)', 'versana-companion' ), 
                (int) $code 
            ),
        );
    }
    
    return $data;
}

/**
 * Activate license with auto-save
 */
function versana_companion_activate_license( $license_key ) {
    // Validate format
    if ( empty( $license_key ) || ! preg_match( '/^[A-F0-9]{8}-[A-F0-9]{8}-[A-F0-9]{8}-[A-F0-9]{8}$/i', $license_key ) ) {
        return array(
            'success' => false,
            'error'   => 'invalid_format',
            'message' => __( 'Invalid license key format. Expected: XXXXXXXX-XXXXXXXX-XXXXXXXX-XXXXXXXX', 'versana-companion' ),
        );
    }
    
    // CRITICAL: Save license key FIRST before activation attempt
    versana_companion_update_option( 'license_key', sanitize_text_field( $license_key ) );
    
    // Call activate endpoint
    $result = versana_companion_license_api_request(
        'activate',
        array( 'license_key' => $license_key )
    );
    
    if ( ! isset( $result['success'] ) || ! $result['success'] ) {
        return $result;
    }
    
    // Store activation token
    if ( isset( $result['data']['activation_token'] ) ) {
        versana_companion_update_option( 'activation_token', $result['data']['activation_token'] );
    }
    
    // Verify to get full license details
    $verify_result = versana_companion_license_api_request( 'validate', array( 'license_key' => $license_key ) );
    
    if ( isset( $verify_result['success'] ) && $verify_result['success'] && isset( $verify_result['data'] ) ) {
        // Update status
        versana_companion_update_option( 'license_status', 'active' );
        versana_companion_update_option( 'license_last_check', time() );
        
        // Store license data
        $license_data = array(
            'license_type'      => isset( $verify_result['data']['license_type'] ) ? $verify_result['data']['license_type'] : '',
            'status'            => isset( $verify_result['data']['status'] ) ? $verify_result['data']['status'] : '',
            'max_activations'   => isset( $verify_result['data']['max_activations'] ) ? intval( $verify_result['data']['max_activations'] ) : 0,
            'activation_count'  => isset( $verify_result['data']['activation_count'] ) ? intval( $verify_result['data']['activation_count'] ) : 0,
            'expires_at'        => isset( $verify_result['data']['expires_at'] ) ? $verify_result['data']['expires_at'] : null,
            'product_name'      => isset( $verify_result['data']['product']['name'] ) ? $verify_result['data']['product']['name'] : '',
            'product_slug'      => isset( $verify_result['data']['product']['slug'] ) ? $verify_result['data']['product']['slug'] : '',
        );
        
        versana_companion_update_option( 'license_data', $license_data );
        
        // Clear cache
        delete_transient( 'versana_license_check' );
        
        // Set cache
        if ( versana_companion_is_cache_enabled() ) {
            set_transient( 'versana_license_check', 'valid', 12 * HOUR_IN_SECONDS );
        }
        
        // Flush cache
        if ( function_exists( 'wp_cache_flush' ) ) {
            wp_cache_flush();
        }
        
        return array(
            'success' => true,
            'message' => __( 'License activated successfully!', 'versana-companion' ),
        );
    }
    
    return array(
        'success' => true,
        'message' => __( 'License activated but verification failed. Please check license status.', 'versana-companion' ),
    );
}

/**
 * Deactivate license
 */
function versana_companion_deactivate_license() {
    $result = versana_companion_license_api_request( 'deactivate' );
    
    if ( isset( $result['success'] ) && $result['success'] ) {
        versana_companion_update_option( 'license_status', 'inactive' );
        versana_companion_update_option( 'license_data', array() );
        versana_companion_update_option( 'activation_token', '' );
        
        delete_transient( 'versana_license_check' );
        
        if ( function_exists( 'wp_cache_flush' ) ) {
            wp_cache_flush();
        }
    }
    
    return $result;
}

/**
 * Verify license status
 */
function versana_companion_verify_license_status() {
    $options = versana_companion_get_all_options();
    $license_key = isset( $options['license_key'] ) ? $options['license_key'] : '';
    
    if ( empty( $license_key ) ) {
        versana_companion_update_option( 'license_status', 'inactive' );
        delete_transient( 'versana_license_check' );
        return false;
    }
    
    $result = versana_companion_license_api_request( 'validate', array( 'license_key' => $license_key ) );
    
    if ( isset( $result['success'] ) && $result['success'] && isset( $result['data'] ) ) {
        versana_companion_update_option( 'license_status', 'active' );
        versana_companion_update_option( 'license_last_check', time() );
        
        $license_data = array(
            'license_type'      => isset( $result['data']['license_type'] ) ? $result['data']['license_type'] : '',
            'status'            => isset( $result['data']['status'] ) ? $result['data']['status'] : '',
            'max_activations'   => isset( $result['data']['max_activations'] ) ? intval( $result['data']['max_activations'] ) : 0,
            'activation_count'  => isset( $result['data']['activation_count'] ) ? intval( $result['data']['activation_count'] ) : 0,
            'expires_at'        => isset( $result['data']['expires_at'] ) ? $result['data']['expires_at'] : null,
            'product_name'      => isset( $result['data']['product']['name'] ) ? $result['data']['product']['name'] : '',
            'product_slug'      => isset( $result['data']['product']['slug'] ) ? $result['data']['product']['slug'] : '',
        );
        
        versana_companion_update_option( 'license_data', $license_data );
        
        if ( versana_companion_is_cache_enabled() ) {
            set_transient( 'versana_license_check', 'valid', 12 * HOUR_IN_SECONDS );
        }
        
        return true;
    } else {
        versana_companion_update_option( 'license_status', 'inactive' );
        versana_companion_update_option( 'license_data', array() );
        delete_transient( 'versana_license_check' );
        
        return false;
    }
}

/**
 * Check license cache
 */
function versana_companion_check_license_cache() {
    if ( ! versana_companion_is_cache_enabled() ) {
        return;
    }
    
    $cached = get_transient( 'versana_license_check' );
    if ( false === $cached ) {
        versana_companion_verify_license_status();
    }
}

/**
 * Check if PRO license is active
 */
function versana_companion_is_pro_active() {
    $license_data = versana_companion_get_license_data();
    return 'active' === $license_data['license_status'];
}

/**
 * AJAX: Activate license
 */
function versana_companion_ajax_activate_license() {
    check_ajax_referer( 'versana_license_action', 'nonce' );
    
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'Permission denied.', 'versana-companion' ) ) );
    }
    
    $license_key = isset( $_POST['license_key'] ) ? sanitize_text_field( wp_unslash( $_POST['license_key'] ) ) : '';
    
    if ( empty( $license_key ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a license key.', 'versana-companion' ) ) );
    }

    $result = versana_companion_activate_license( $license_key );
    
    if ( isset( $result['success'] ) && $result['success'] ) {
        wp_send_json_success( array( 'message' => $result['message'] ) );
    } else {
        wp_send_json_error( array( 'message' => isset( $result['message'] ) ? $result['message'] : __( 'Activation failed.', 'versana-companion' ) ) );
    }
}

/**
 * AJAX: Deactivate license
 */
function versana_companion_ajax_deactivate_license() {
    check_ajax_referer( 'versana_license_action', 'nonce' );
    
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'Permission denied.', 'versana-companion' ) ) );
    }
    
    $result = versana_companion_deactivate_license();
    
    if ( isset( $result['success'] ) && $result['success'] ) {
        wp_send_json_success( array( 'message' => __( 'License deactivated successfully.', 'versana-companion' ) ) );
    } else {
        wp_send_json_error( array( 'message' => isset( $result['message'] ) ? $result['message'] : __( 'Deactivation failed.', 'versana-companion' ) ) );
    }
}

/**
 * AJAX: Check license
 */
function versana_companion_ajax_check_license() {
    check_ajax_referer( 'versana_license_action', 'nonce' );
    
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'Permission denied.', 'versana-companion' ) ) );
    }
    
    $is_valid = versana_companion_verify_license_status();
    
    if ( $is_valid ) {
        wp_send_json_success( array( 'message' => __( 'License is valid and active!', 'versana-companion' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'License verification failed. Please check your license key.', 'versana-companion' ) ) );
    }
}