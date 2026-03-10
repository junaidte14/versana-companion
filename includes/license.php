<?php
/**
 * License verification for Versana Companion - FIXED VERSION
 * Integrated with Versana Theme Options
 * 
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
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
 * Helper function to safely get theme options
 * Provides fallback if theme functions don't exist
 */
function versana_companion_get_option( $key, $default = '' ) {
    // Try theme's function first
    if ( function_exists( 'versana_get_option' ) ) {
        return versana_get_option( $key, $default );
    }
    
    // Fallback: Get from theme options array
    $options = get_option( 'versana_theme_options', array() );
    return isset( $options[ $key ] ) ? $options[ $key ] : $default;
}

/**
 * Helper function to safely get all theme options
 * Provides fallback if theme functions don't exist
 */
function versana_companion_get_all_options() {
    // Try theme's function first
    if ( function_exists( 'versana_get_all_options' ) ) {
        return versana_get_all_options();
    }
    
    // Fallback: Get theme options array
    return get_option( 'versana_theme_options', array() );
}

/**
 * Helper function to safely update theme option
 * Provides fallback if theme functions don't exist
 */
function versana_companion_update_option( $key, $value ) {
    // Try theme's function first
    if ( function_exists( 'versana_update_option' ) ) {
        return versana_update_option( $key, $value );
    }
    
    // Fallback: Update in theme options array
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
    // Production URL
    $server_url = 'https://versana.codoplex.com';
    
    // Allow override via constant for development
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
    
    return $defaults;
}
add_filter( 'versana_default_options', 'versana_companion_add_license_defaults' );

/**
 * Sanitize license options
 */
function versana_companion_sanitize_license_options( $sanitized, $input ) {
    // Sanitize license key
    if ( isset( $input['license_key'] ) ) {
        $sanitized['license_key'] = sanitize_text_field( $input['license_key'] );
    }
    
    // These fields are managed programmatically, not from form
    // But preserve them if they exist in the database
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
    
    // Get current options using our safe helper function
    $options = versana_companion_get_all_options();
    
    $license_key    = isset( $options['license_key'] ) ? $options['license_key'] : '';
    $license_status = isset( $options['license_status'] ) ? $options['license_status'] : 'inactive';
    $license_data   = isset( $options['license_data'] ) ? $options['license_data'] : array();
    $last_check     = isset( $options['license_last_check'] ) ? $options['license_last_check'] : 0;
    
    $is_valid = ( 'active' === $license_status );
    ?>
    <div class="versana-settings-section">
        <h3><?php esc_html_e( 'Versana PRO License', 'versana-companion' ); ?></h3>
        
        <div id="versana-license-messages"></div>
        
        <?php if ( 'active' === $license_status ) : ?>
            
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
                            <code class="versana-license-key-display"><?php echo esc_html( $license_key ); ?></code>
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
                    <?php if ( ! empty( $license_data['expires_at'] ) ) : ?>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Expires', 'versana-companion' ); ?></th>
                            <td><?php echo esc_html( date( 'F j, Y', strtotime( $license_data['expires_at'] ) ) ); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if ( ! empty( $license_data['customer']['name'] ) ) : ?>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Registered To', 'versana-companion' ); ?></th>
                            <td>
                                <?php echo esc_html( $license_data['customer']['name'] ); ?>
                                (<?php echo esc_html( $license_data['customer']['email'] ); ?>)
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Last Verified', 'versana-companion' ); ?></th>
                        <td>
                            <?php
                            if ( $last_check ) {
                                echo esc_html( human_time_diff( $last_check, time() ) . ' ago' );
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
                            <button type="button" class="button" id="versana-deactivate-license">
                                <span class="dashicons dashicons-dismiss"></span>
                                <?php esc_html_e( 'Deactivate License', 'versana-companion' ); ?>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            
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
                                value="<?php echo esc_attr( $license_key ); ?>"
                                class="regular-text"
                                placeholder="VRS-XXXX-XXXX-XXXX-XXXX"
                                <?php echo $is_valid ? 'readonly' : ''; ?> 
                            />
                            <?php if ( $is_valid ) : ?>
                                <p class="description">
                                    <span class="dashicons dashicons-yes" style="color: #46b450;"></span>
                                    <?php esc_html_e( 'License is active and validated.', 'versana-pro' ); ?>
                                </p>
                            <?php else : ?>
                                <p class="description">
                                    <?php esc_html_e( 'Enter your Versana PRO license key to unlock premium features.', 'versana-pro' ); ?>
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php if ( $is_valid && ! empty( $license_data['plan_name'] ) ) : ?>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Plan', 'versana-pro' ); ?></th>
                        <td>
                            <strong><?php echo esc_html( $license_data['plan_name'] ); ?></strong>
                        </td>
                    </tr>
                    <?php endif; ?>
                    
                    <?php if ( $is_valid && ! empty( $license_data['expires_at'] ) ) : ?>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Expires', 'versana-pro' ); ?></th>
                        <td>
                            <?php 
                            $expires = strtotime( $license_data['expires_at'] );
                            if ( $expires > time() ) {
                                echo esc_html( date_i18n( get_option( 'date_format' ), $expires ) );
                            } else {
                                echo '<span style="color: #dc3232;">' . esc_html__( 'Expired', 'versana-pro' ) . '</span>';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Site URL', 'versana-pro' ); ?></th>
                        <td>
                            <code><?php echo esc_html( home_url() ); ?></code>
                            <p class="description">
                                <?php esc_html_e( 'This URL must be activated on your license.', 'versana-pro' ); ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Actions', 'versana-companion' ); ?></th>
                        <td>
                            <button type="button" class="button button-primary" id="versana-activate-license-btn">
                                <?php esc_html_e( 'Activate License', 'versana-companion' ); ?>
                            </button>
                            <p class="description">
                                <?php esc_html_e( 'Click to activate your license key with our server.', 'versana-companion' ); ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                <h4><?php esc_html_e( 'Don\'t have a license?', 'versana-companion' ); ?></h4>
                <p><?php esc_html_e( 'Purchase Versana PRO to unlock premium demos and features.', 'versana-companion' ); ?></p>
                <p>
                    <a href="<?php echo esc_url( versana_companion_get_license_server_url() . 'purchase/' ); ?>" 
                       class="button button-primary" 
                       target="_blank">
                        <span class="dashicons dashicons-cart"></span>
                        <?php esc_html_e( 'Purchase Versana PRO', 'versana-companion' ); ?>
                    </a>
                </p>
            </div>
            
        <?php endif; ?>
        
    </div>
    
    <style>
        /* License Tab Styles */
        .versana-status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 3px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .versana-status-active {
            background: #d4edda;
            color: #155724;
        }
        
        .versana-status-inactive {
            background: #f8d7da;
            color: #721c24;
        }
        
        .versana-license-key-display {
            background: #f5f5f5;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
        }
        
        .form-table th[scope="row"] button,
        .form-table td button {
            margin-right: 10px;
        }
        
        .form-table button .dashicons {
            font-size: 16px;
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 5px;
        }
        
        #versana-license-messages {
            margin: 15px 0;
        }
        
        #versana-license-messages .notice {
            margin: 0 0 15px;
        }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        
        // Activate license
        $('#versana-activate-license-btn').on('click', function(e) {
            e.preventDefault();
            
            var licenseKey = $('#versana_license_key').val().trim();
            var $button = $(this);
            var originalText = $button.text();
            
            if (!licenseKey) {
                alert('<?php esc_html_e( 'Please enter a license key.', 'versana-companion' ); ?>');
                return;
            }
            
            $button.prop('disabled', true).text('<?php esc_html_e( 'Activating...', 'versana-companion' ); ?>');
            $('#versana-license-messages').empty();
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'versana_activate_license',
                    nonce: '<?php echo wp_create_nonce( 'versana_license_action' ); ?>',
                    license_key: licenseKey
                },
                success: function(response) {
                    if (response.success) {
                        $('#versana-license-messages').html('<div class="notice notice-success"><p><strong>' + response.data.message + '</strong></p></div>');
                        // Wait a bit longer to ensure DB write completes
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        $('#versana-license-messages').html('<div class="notice notice-error"><p><strong>' + response.data.message + '</strong></p></div>');
                        $button.prop('disabled', false).text(originalText);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    $('#versana-license-messages').html(
                        '<div class="notice notice-error"><p><strong><?php esc_html_e( 'An error occurred. Please try again.', 'versana-companion' ); ?></strong></p></div>'
                    );
                    $button.prop('disabled', false).text(originalText);
                }
            });
        });
        
        // Deactivate license
        $('#versana-deactivate-license').on('click', function(e) {
            e.preventDefault();
            
            if (!confirm('<?php esc_html_e( 'Are you sure you want to deactivate your license?', 'versana-companion' ); ?>')) {
                return;
            }
            
            var $button = $(this);
            var originalHtml = $button.html();
            
            $button.prop('disabled', true).text('<?php esc_html_e( 'Deactivating...', 'versana-companion' ); ?>');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'versana_deactivate_license',
                    nonce: '<?php echo wp_create_nonce( 'versana_license_action' ); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        $('#versana-license-messages').html(
                            '<div class="notice notice-success"><p><strong>' + response.data.message + '</strong></p></div>'
                        );
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        alert('<?php esc_html_e( 'Error:', 'versana-companion' ); ?> ' + response.data.message);
                        $button.prop('disabled', false).html(originalHtml);
                    }
                },
                error: function() {
                    alert('<?php esc_html_e( 'An error occurred. Please try again.', 'versana-companion' ); ?>');
                    $button.prop('disabled', false).html(originalHtml);
                }
            });
        });
        
        // Check license
        $('#versana-check-license').on('click', function(e) {
            e.preventDefault();
            
            var $button = $(this);
            var originalHtml = $button.html();
            
            $button.prop('disabled', true).html('<span class="dashicons dashicons-update spin"></span> <?php esc_html_e( 'Checking...', 'versana-companion' ); ?>');
            $('#versana-license-messages').empty();
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'versana_check_license',
                    nonce: '<?php echo wp_create_nonce( 'versana_license_action' ); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        $('#versana-license-messages').html(
                            '<div class="notice notice-success"><p><strong>' + response.data.message + '</strong></p></div>'
                        );
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else {
                        $('#versana-license-messages').html(
                            '<div class="notice notice-error"><p><strong>' + response.data.message + '</strong></p></div>'
                        );
                    }
                    $button.prop('disabled', false).html(originalHtml);
                },
                error: function() {
                    $('#versana-license-messages').html(
                        '<div class="notice notice-error"><p><strong><?php esc_html_e( 'An error occurred. Please try again.', 'versana-companion' ); ?></strong></p></div>'
                    );
                    $button.prop('disabled', false).html(originalHtml);
                }
            });
        });
        
        // Add spin animation
        if (!document.getElementById('versana-license-spin-style')) {
            var style = document.createElement('style');
            style.id = 'versana-license-spin-style';
            style.textContent = '@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } } .spin { animation: spin 1s linear infinite; display: inline-block; }';
            document.head.appendChild(style);
        }
        
    });
    </script>
    <?php
}

/**
 * Make API request to license server
 */
function versana_companion_license_api_request( $endpoint, $data = array() ) {
    $server_url = versana_companion_get_license_server_url();
    $api_url = $server_url . 'wp-json/versana-license/v1/' . ltrim( $endpoint, '/' );
    
    $site_url = home_url();
    
    // Get license key from options
    $options = versana_companion_get_all_options();
    $license_key = isset( $data['license_key'] ) ? $data['license_key'] : ( isset( $options['license_key'] ) ? $options['license_key'] : '' );
    
    $request_data = array_merge(
        $data,
        array(
            'license_key' => $license_key,
            'site_url'    => $site_url,
        )
    );
    
    $response = wp_remote_post(
        $api_url,
        array(
            'body'      => $request_data,
            'timeout'   => 30,
            'sslverify' => true,
        )
    );
    
    if ( is_wp_error( $response ) ) {
        error_log( 'Versana License API Error: ' . $response->get_error_message() );
        return array(
            'success' => false,
            'message' => $response->get_error_message(),
        );
    }
    
    $body = wp_remote_retrieve_body( $response );
    $code = wp_remote_retrieve_response_code( $response );
    $data = json_decode( $body, true );
    
    if ( ! $data ) {
        error_log( 'Versana License: Invalid JSON response from server' );
        return array(
            'success' => false,
            'message' => 'Invalid response from license server.',
        );
    }
    
    // Log the response for debugging
    error_log( sprintf(
        'Versana License API Response [%s]: Code %d, Success: %s, Message: %s',
        $endpoint,
        $code,
        isset( $data['success'] ) ? ( $data['success'] ? 'true' : 'false' ) : 'unknown',
        isset( $data['message'] ) ? $data['message'] : 'No message'
    ) );
    
    return $data;
}

/**
 * Activate license - IMPROVED VERSION
 */
function versana_companion_activate_license( $license_key ) {
    // Validate license key format before making API call
    if ( empty( $license_key ) || ! preg_match( '/^VRS-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}$/', $license_key ) ) {
        return array(
            'success' => false,
            'message' => __( 'Invalid license key format.', 'versana-companion' ),
        );
    }
    
    $result = versana_companion_license_api_request(
        'activate',
        array( 'license_key' => $license_key )
    );
    
    if ( $result['success'] ) {
        // Update all license fields atomically
        $update_data = array(
            'license_key'        => sanitize_text_field( $license_key ),
            'license_status'     => 'active',
            'license_last_check' => time(),
        );
        
        // Add license data if provided
        if ( isset( $result['license'] ) ) {
            $update_data['license_data'] = $result['license'];
        }
        
        // Update all fields together to avoid race conditions
        foreach ( $update_data as $key => $value ) {
            versana_companion_update_option( $key, $value );
        }
        
        // Clear cache
        delete_transient( 'versana_license_check' );
        
        // Set cache as valid
        set_transient( 'versana_license_check', 'valid', 12 * HOUR_IN_SECONDS );
        
        // Force options to be saved immediately
        if ( function_exists( 'wp_cache_flush' ) ) {
            wp_cache_flush();
        }
        
        error_log( 'Versana License: License activated successfully - ' . $license_key );
    } else {
        error_log( 'Versana License: Activation failed - ' . ( isset( $result['message'] ) ? $result['message'] : 'Unknown error' ) );
    }
    
    return $result;
}

/**
 * Deactivate license
 */
function versana_companion_deactivate_license() {
    $result = versana_companion_license_api_request( 'deactivate' );
    
    if ( $result['success'] ) {
        versana_companion_update_option( 'license_status', 'inactive' );
        versana_companion_update_option( 'license_data', array() );
        
        // Clear cache
        delete_transient( 'versana_license_check' );
        
        // Force options to be saved immediately
        if ( function_exists( 'wp_cache_flush' ) ) {
            wp_cache_flush();
        }
        
        error_log( 'Versana License: License deactivated successfully' );
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
        return false;
    }
    
    $result = versana_companion_license_api_request( 'verify' );
    
    if ( isset( $result['valid'] ) && $result['valid'] ) {
        versana_companion_update_option( 'license_status', 'active' );
        versana_companion_update_option( 'license_last_check', time() );
        
        // Store license data
        $license_data = array(
            'license_type' => isset( $result['license_type'] ) ? $result['license_type'] : '',
            'expires_at'   => isset( $result['expires_at'] ) ? $result['expires_at'] : null,
            'customer'     => isset( $result['customer'] ) ? $result['customer'] : array(),
        );
        versana_companion_update_option( 'license_data', $license_data );
        
        // Update cache
        set_transient( 'versana_license_check', 'valid', 12 * HOUR_IN_SECONDS );
        
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
    // During admin testing always verify license
    if ( is_admin() && current_user_can( 'manage_options' ) ) {
        versana_companion_verify_license_status();
        return;
    }
    $cached = get_transient( 'versana_license_check' );
    if ( false === $cached ) {
        // Cache expired, verify license
        versana_companion_verify_license_status();
    }
}

/**
 * Check if PRO license is active
 */
function versana_companion_is_pro_active() {
    $options = versana_companion_get_all_options();
    $status = isset( $options['license_status'] ) ? $options['license_status'] : 'inactive';
    return 'active' === $status;
}

/**
 * AJAX: Activate license - IMPROVED VERSION
 */
function versana_companion_ajax_activate_license() {
    check_ajax_referer( 'versana_license_action', 'nonce' );
    
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'Permission denied.', 'versana-companion' ) ) );
    }
    
    $license_key = isset( $_POST['license_key'] ) ? sanitize_text_field( $_POST['license_key'] ) : '';
    versana_update_option('license_key', $license_key);
    $license_key = versana_get_option('license_key', '');
    if ( empty( $license_key ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a license key.', 'versana-companion' ) ) );
    }
    
    // Activate the license
    $result = versana_companion_activate_license( $license_key );
    
    if ( $result['success'] ) {
        // Verify the update was successful by reading back
        $verify_status = versana_companion_get_option( 'license_status' );
        
        if ( $verify_status !== 'active' ) {
            error_log( 'Versana License: Warning - License status not updated properly. Expected: active, Got: ' . $verify_status );
            wp_send_json_error( array( 
                'message' => __( 'License activation may have failed. Please refresh the page and try again.', 'versana-companion' ) 
            ) );
        }
        
        wp_send_json_success(
            array( 'message' => __( 'License activated successfully!', 'versana-companion' ) )
        );
    } else {
        wp_send_json_error(
            array( 'message' => $result['message'] )
        );
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
    
    if ( $result['success'] ) {
        wp_send_json_success(
            array( 'message' => __( 'License deactivated successfully.', 'versana-companion' ) )
        );
    } else {
        wp_send_json_error(
            array( 'message' => $result['message'] )
        );
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
        wp_send_json_success(
            array( 'message' => __( 'License is valid and active!', 'versana-companion' ) )
        );
    } else {
        wp_send_json_error(
            array( 'message' => __( 'License verification failed. Please check your license key.', 'versana-companion' ) )
        );
    }
}