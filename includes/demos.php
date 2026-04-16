<?php
/**
 * Versana Theme Demos
 *
 * Free demos are fully importable by all users.
 * PRO demo cards are informational teasers that link to the Versana PRO plugin.
 * Actual PRO demo import functionality is provided by the separate Versana PRO plugin,
 * which hooks into the `versana_companion_available_demos` filter.
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ---------------------------------------------------------------------------
// Dependency helpers (used only for demos that declare `dependencies`)
// ---------------------------------------------------------------------------

/**
 * Check whether required plugins are installed and active.
 *
 * @param array $required_plugins Array of plugin slugs.
 * @return array {
 *     @type bool  $all_active Whether all required plugins are active.
 *     @type array $missing    Plugin names that are not installed.
 *     @type array $inactive   Plugin names that are installed but not active.
 * }
 */
function versana_companion_check_required_plugins( $required_plugins ) {
    $result = array(
        'all_active' => true,
        'missing'    => array(),
        'inactive'   => array(),
    );

    if ( empty( $required_plugins ) ) {
        return $result;
    }

    $plugin_names = array(
        'woocommerce'    => 'WooCommerce',
        'contact-form-7' => 'Contact Form 7',
    );

    foreach ( $required_plugins as $plugin_slug ) {
        $plugin_name = isset( $plugin_names[ $plugin_slug ] )
            ? $plugin_names[ $plugin_slug ]
            : ucfirst( str_replace( '-', ' ', $plugin_slug ) );

        if ( 'woocommerce' === $plugin_slug ) {
            if ( ! class_exists( 'WooCommerce' ) ) {
                $result['all_active'] = false;
                if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
                    $result['inactive'][] = $plugin_name;
                } else {
                    $result['missing'][] = $plugin_name;
                }
            }
        } else {
            $plugin_file = $plugin_slug . '/' . $plugin_slug . '.php';
            if ( ! is_plugin_active( $plugin_file ) ) {
                $result['all_active'] = false;
                if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_file ) ) {
                    $result['inactive'][] = $plugin_name;
                } else {
                    $result['missing'][] = $plugin_name;
                }
            }
        }
    }

    return $result;
}

/**
 * Get install / activate URLs for a plugin.
 *
 * @param string $plugin_slug Plugin slug.
 * @return array { install_url, activate_url }
 */
function versana_companion_get_plugin_urls( $plugin_slug ) {
    $plugin_file = ( 'woocommerce' === $plugin_slug )
        ? 'woocommerce/woocommerce.php'
        : $plugin_slug . '/' . $plugin_slug . '.php';

    return array(
        'install_url'  => wp_nonce_url(
            add_query_arg( array( 'action' => 'install-plugin', 'plugin' => $plugin_slug ), admin_url( 'update.php' ) ),
            'install-plugin_' . $plugin_slug
        ),
        'activate_url' => wp_nonce_url(
            add_query_arg( array( 'action' => 'activate', 'plugin' => $plugin_file ), admin_url( 'plugins.php' ) ),
            'activate-plugin_' . $plugin_file
        ),
    );
}

// ---------------------------------------------------------------------------
// Demo registry
// ---------------------------------------------------------------------------

/**
 * Return the list of demos shown in the Demo Import tab.
 *
 * FREE demos have `is_pro => false` and a local `xml_file`.
 * PRO demo stubs have `is_pro => true` and no `xml_file`; they exist solely
 * to render an informational teaser card. The Versana PRO plugin adds fully
 * functional entries via the `versana_companion_available_demos` filter.
 *
 * @return array
 */
function versana_companion_get_available_demos() {

    $demos = array(

        // ── FREE DEMOS ──────────────────────────────────────────────────────

        'blog' => array(
            'name'           => __( 'Personal Blog', 'versana-companion' ),
            'description'    => __( 'Clean and minimal blog layout perfect for writers and content creators.', 'versana-companion' ),
            'preview_url'    => 'https://versana.codoplex.com/versana-blog/',
            'thumbnail'      => VERSANA_COMPANION_URL . 'assets/images/blog.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/blog.webp',
            'xml_file'       => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'       => 'blog',
            'is_pro'         => false,
            'tags'           => array( 'blog', 'minimal', 'writer' ),
            'features'       => array(
                __( '✓ Magazine-quality layouts', 'versana-companion' ),
                __( '✓ Optimized for readability', 'versana-companion' ),
                __( '✓ Styled Block patterns', 'versana-companion' ),
                sprintf( 
                    /* translators: %s: Performance score value (e.g., 90) */    
                    __( '✓ %s+ Performance Score', 'versana-companion' ), '90' 
                ),
            ),
        ),

        'business' => array(
            'name'           => __( 'Business Website', 'versana-companion' ),
            'description'    => __( 'Professional business website perfect for corporate sites and agencies.', 'versana-companion' ),
            'preview_url'    => 'https://versana.codoplex.com/business/',
            'thumbnail'      => VERSANA_COMPANION_URL . 'assets/images/business.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/business.webp',
            'xml_file'       => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'       => 'business',
            'is_pro'         => false,
            'tags'           => array( 'business', 'corporate', 'professional' ),
            'features'       => array(
                __( '✓ Conversion-focused design', 'versana-companion' ),
                __( '✓ Professional credibility', 'versana-companion' ),
                __( '✓ Modern SaaS aesthetic', 'versana-companion' ),
                sprintf( 
                    /* translators: %s: Performance score value (e.g., 90) */    
                    __( '✓ %s+ Performance Score', 'versana-companion' ), '90' 
                ),
            ),
        ),

        'portfolio' => array(
            'name'           => __( 'Creative Portfolio', 'versana-companion' ),
            'description'    => __( 'Showcase your work with a beautiful portfolio layout for creatives.', 'versana-companion' ),
            'preview_url'    => 'https://versana.codoplex.com/portfolio/',
            'thumbnail'      => VERSANA_COMPANION_URL . 'assets/images/portfolio.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/portfolio.webp',
            'xml_file'       => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'       => 'portfolio',
            'is_pro'         => false,
            'tags'           => array( 'portfolio', 'creative', 'showcase' ),
            'features'       => array(
                __( '✓ Stunning visual galleries', 'versana-companion' ),
                __( '✓ Project case study layouts', 'versana-companion' ),
                __( '✓ Client testimonial sections', 'versana-companion' ),
                sprintf( 
                    /* translators: %s: Performance score value (e.g., 90) */    
                    __( '✓ %s+ Performance Score', 'versana-companion' ), '90' 
                ),
            ),
        ),

        'boutique' => array(
            'name'        => __( 'Boutique', 'versana-companion' ),
            'description' => __( 'Elegant boutique and e-commerce website with lookbook and product showcase.', 'versana-companion' ),
            'preview_url' => 'https://versana.codoplex.com/boutique/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/boutique.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/boutique.webp',
            'xml_file'    => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'    => 'ecommerce',
            'is_pro'      => false,
            'tags'        => array( 'boutique', 'clothing', 'ecommerce', 'shop' ),
            'features'    => array(
                __( '✓ Product showcase', 'versana-companion' ),
                __( '✓ Editorial lookbook', 'versana-companion' ),
                __( '✓ Size guide', 'versana-companion' ),
                sprintf( 
                    /* translators: %s: Performance score value (e.g., 90) */    
                    __( '✓ %s+ Performance Score', 'versana-companion' ), '90' 
                ),
            ),
        ),

        // ── PRO TEASER STUBS ─────────────────────────────────────────────────
        // These render informational cards only. No xml_file, no import button.
        // The Versana PRO plugin replaces these with fully functional entries
        // via the `versana_companion_available_demos` filter.

        'restaurant' => array(
            'name'         => __( 'Restaurant & Cafe', 'versana-companion' ),
            'description'  => __( 'Warm, food-focused design with reservation flow, menu showcases, and food photography layouts.', 'versana-companion' ),
            'preview_url'  => 'https://versana.codoplex.com/restaurant/',
            'thumbnail'    => VERSANA_COMPANION_URL . 'assets/images/restaurant.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/restaurant.webp',
            'category'     => 'business',
            'is_pro'       => true,
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'     => array(
                __( '✓ Mobile-first reservation flow', 'versana-companion' ),
                __( '✓ Menu showcase layouts', 'versana-companion' ),
                __( '✓ Food photography optimized', 'versana-companion' ),
            ),
        ),

        'fitness' => array(
            'name'         => __( 'Fitness & Wellness', 'versana-companion' ),
            'description'  => __( 'Dynamic fitness site with class schedule layouts, member stories, and pricing sections.', 'versana-companion' ),
            'preview_url'  => 'https://versana.codoplex.com/fitness/',
            'thumbnail'    => VERSANA_COMPANION_URL . 'assets/images/fitness.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/fitness.webp',
            'category'     => 'business',
            'is_pro'       => true,
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'     => array(
                __( '✓ Class schedule & booking layouts', 'versana-companion' ),
                __( '✓ Member transformation stories', 'versana-companion' ),
                __( '✓ Flexible pricing layouts', 'versana-companion' ),
            ),
        ),

        'real-estate' => array(
            'name'         => __( 'Real Estate & Property', 'versana-companion' ),
            'description'  => __( 'Property-focused design with listing layouts, search areas, and agent profile sections.', 'versana-companion' ),
            'preview_url'  => 'https://versana.codoplex.com/real-estate/',
            'thumbnail'    => VERSANA_COMPANION_URL . 'assets/images/real-estate.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/real-estate.webp',
            'category'     => 'business',
            'is_pro'       => true,
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'     => array(
                __( '✓ Property search & filters', 'versana-companion' ),
                __( '✓ Featured listings layouts', 'versana-companion' ),
                __( '✓ Agent profile sections', 'versana-companion' ),
            ),
        ),

        'woocommerce-store' => array(
            'name'         => __( 'WooCommerce Store', 'versana-companion' ),
            'description'  => __( 'Professional e-commerce store design for specialty retail businesses.', 'versana-companion' ),
            'preview_url'  => 'https://versana.codoplex.com/woocommerce-store/',
            'thumbnail'    => VERSANA_COMPANION_URL . 'assets/images/woocommerce-store.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/woocommerce-store.webp',
            'category'     => 'e-commerce',
            'is_pro'       => true,
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'     => array(
                __( '✓ WooCommerce product showcase layouts', 'versana-companion' ),
                __( '✓ Professional e-commerce design', 'versana-companion' ),
                __( '✓ Warranty & trust building sections', 'versana-companion' ),
            ),
        ),

        'education' => array(
            'name'        => __( 'Education Platform', 'versana-companion' ),
            'description' => __( 'Online learning platform with courses, instructors, and student outcomes.', 'versana-companion' ),
            'preview_url' => 'https://versana.codoplex.com/education/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/education.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/education.webp',
            'category'    => 'business',
            'is_pro'      => true,
            'tags'        => array( 'education', 'learning', 'courses', 'elearning' ),
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'    => array(
                __( '✓ Course catalog', 'versana-companion' ),
                __( '✓ Instructor profiles', 'versana-companion' ),
                __( '✓ Pricing plans', 'versana-companion' ),
            ),
        ),

        'saas' => array(
            'name'        => __( 'SaaS Platform', 'versana-companion' ),
            'description' => __( 'Modern SaaS and software company website with all essential features.', 'versana-companion' ),
            'preview_url' => 'https://versana.codoplex.com/saas/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/saas.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/saas.webp',
            'category'    => 'business',
            'is_pro'      => true,
            'tags'        => array( 'saas', 'software', 'technology', 'startup' ),
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'    => array(
                __( '✓ Modern SaaS design', 'versana-companion' ),
                __( '✓ Pricing comparison tables', 'versana-companion' ),
                __( '✓ Integration showcase', 'versana-companion' ),
            ),
        ),

        'medical' => array(
            'name'        => __( 'Healthcare Clinic', 'versana-companion' ),
            'description' => __( 'Complete medical and healthcare clinic website with appointment booking.', 'versana-companion' ),
            'preview_url' => 'https://versana.codoplex.com/medical/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/medical.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/medical.webp',
            'category'    => 'business',
            'is_pro'      => true,
            'tags'        => array( 'medical', 'healthcare', 'clinic', 'doctor' ),
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'    => array(
                __( '✓ Appointment booking form', 'versana-companion' ),
                __( '✓ Doctor profiles', 'versana-companion' ),
                __( '✓ Service showcase', 'versana-companion' ),
            ),
        ),

        'law' => array(
            'name'        => __( 'Law Firm', 'versana-companion' ),
            'description' => __( 'Professional law firm website with practice areas and attorney profiles.', 'versana-companion' ),
            'preview_url' => 'https://versana.codoplex.com/law/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/law.webp',
            'thumbnail_path' => VERSANA_COMPANION_PATH . 'assets/images/law.webp',
            'category'    => 'business',
            'is_pro'      => true,
            'tags'        => array( 'law', 'legal', 'attorney', 'lawyer' ),
            'purchase_url' => VERSANA_PRO_PURCHASE_URL,
            'features'    => array(
                __( '✓ Practice area showcase', 'versana-companion' ),
                __( '✓ Attorney profiles', 'versana-companion' ),
                __( '✓ Case results', 'versana-companion' ),
            ),
        ),

    );

    /**
     * Filter: versana_companion_available_demos
     *
     * The Versana PRO plugin uses this filter to replace the PRO teaser stubs
     * above with fully functional demo entries that include an `xml_file` and
     * full import support.
     *
     * @param array $demos Demo configuration array.
     * @return array
     *
     * @since 1.0.0
     */
    return apply_filters( 'versana_companion_available_demos', $demos );
}

// ---------------------------------------------------------------------------
// Admin tab registration
// ---------------------------------------------------------------------------

/**
 * Add Demo Import tab to theme options.
 *
 * @param array $tabs
 * @return array
 */
function versana_companion_add_settings_tabs( $tabs ) {
    $tabs['demo_import'] = array(
        'title'    => __( 'Demo Import', 'versana-companion' ),
        'icon'     => 'dashicons-download',
        'callback' => 'versana_companion_render_demo_import_tab',
        'priority' => 5,
    );
    return $tabs;
}
add_filter( 'versana_option_tabs', 'versana_companion_add_settings_tabs' );

// ---------------------------------------------------------------------------
// Demo Import tab rendering
// ---------------------------------------------------------------------------

/**
 * Render the Demo Import tab.
 *
 * Free demos get a full import UI.
 * PRO demo stubs get an informational teaser card with a "Get PRO" link.
 * If the Versana PRO plugin is active it replaces the stubs via the filter,
 * so those cards will then also show an import button.
 */
function versana_companion_render_demo_import_tab() {
    $imported_demo = versana_companion_get_import_data();
    $demos         = versana_companion_get_available_demos();
    $pro_active    = versana_companion_is_pro_active();
    ?>
    <div class="versana-tab-content">
        <h2><?php esc_html_e( 'Import Demo Content', 'versana-companion' ); ?></h2>

        <div id="versana-import-notices"></div>

        <p class="description">
            <?php esc_html_e( 'Choose a free demo to import. This will add sample posts, pages, create navigation menus, and apply theme styling.', 'versana-companion' ); ?>
        </p>

        <?php if ( $imported_demo ) : ?>
            <p class="description">
                <strong><?php esc_html_e( 'Note:', 'versana-companion' ); ?></strong>
                <?php esc_html_e( 'You can import a different demo. Previous demo content will remain unless you remove it first.', 'versana-companion' ); ?>
            </p>
        <?php endif; ?>

        <?php if ( ! $pro_active ) : ?>
            <?php versana_companion_render_pro_upsell_banner( VERSANA_PRO_PURCHASE_URL ); ?>
        <?php endif; ?>

        <div class="versana-demo-library">
            <?php foreach ( $demos as $demo_key => $demo ) :
                $is_pro_stub = ! empty( $demo['is_pro'] ) && empty( $demo['xml_file'] );
                $is_imported = $imported_demo && isset( $imported_demo['demo_key'] ) && $imported_demo['demo_key'] === $demo_key;
                ?>

                <div class="versana-demo-item <?php echo $is_imported ? 'demo-imported' : ''; ?> <?php echo $is_pro_stub ? 'versana-demo-pro-teaser' : ''; ?>"
                     data-demo="<?php echo esc_attr( $demo_key ); ?>"
                     <?php do_action( 'versana_companion_demo_attributes', $demo, $demo_key ); ?>>

                    <!-- Thumbnail -->
                    <div class="demo-thumbnail">
                        <?php if ( ! empty( $demo['thumbnail'] ) && file_exists( $demo['thumbnail_path'] ) ) : ?>
                            <img src="<?php echo esc_url( $demo['thumbnail'] ); ?>"
                                 alt="<?php echo esc_attr( $demo['name'] ); ?>">
                        <?php else : ?>
                            <div class="demo-thumbnail-placeholder">
                                <svg width="100%" height="100%" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="800" height="600" fill="#f5f5f5"/>
                                    <text x="50%" y="50%" font-family="Arial,sans-serif" font-size="24" fill="#999" text-anchor="middle" dominant-baseline="middle">
                                        <?php echo esc_html( $demo['name'] ); ?>
                                    </text>
                                </svg>
                            </div>
                        <?php endif; ?>

                        <?php if ( $is_pro_stub ) : ?>
                            <span class="versana-pro-badge"><?php esc_html_e( 'PRO', 'versana-companion' ); ?></span>
                        <?php endif; ?>

                        <?php if ( $is_imported ) : ?>
                            <div class="demo-imported-badge">
                                <span class="dashicons dashicons-yes-alt"></span>
                                <?php esc_html_e( 'Imported', 'versana-companion' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( ! $is_pro_stub ) : ?>
                            <div class="demo-progress" style="display:none;">
                                <div class="demo-progress-bar"><div class="demo-progress-fill"></div></div>
                                <div class="demo-progress-text"></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Info -->
                    <div class="demo-info">
                        <h3 class="demo-name"><?php echo esc_html( $demo['name'] ); ?></h3>
                        <p class="demo-description"><?php echo esc_html( $demo['description'] ); ?></p>
                        <?php if ( ! empty( $demo['features'] ) ) : ?>
                            <ul class="demo-features">
                                <?php foreach ( $demo['features'] as $feature ) : ?>
                                    <li><?php echo esc_html( $feature ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Import options (free demos only) -->
                    <?php if ( ! $is_pro_stub ) : ?>
                        <div class="demo-import-options">
                            <label class="demo-checkbox">
                                <input type="checkbox" class="import-posts" checked>
                                <?php esc_html_e( 'Posts', 'versana-companion' ); ?>
                            </label>
                            <label class="demo-checkbox">
                                <input type="checkbox" class="import-pages" checked>
                                <?php esc_html_e( 'Pages', 'versana-companion' ); ?>
                            </label>
                            <label class="demo-checkbox">
                                <input type="checkbox" class="import-menu" checked>
                                <?php esc_html_e( 'Menu', 'versana-companion' ); ?>
                            </label>
                        </div>
                    <?php endif; ?>

                    <!-- Actions -->
                    <div class="demo-actions">
                        <?php if ( ! empty( $demo['preview_url'] ) ) : ?>
                            <a href="<?php echo esc_url( $demo['preview_url'] ); ?>"
                               class="button"
                               target="_blank"
                               rel="noopener noreferrer">
                                <span class="dashicons dashicons-visibility"></span>
                                <?php esc_html_e( 'Preview', 'versana-companion' ); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ( $is_pro_stub ) : ?>
                            <!-- PRO teaser: link to PRO plugin, no import functionality here -->
                            <a href="<?php echo esc_url( $demo['purchase_url'] ); ?>"
                               class="button versana-get-pro-btn"
                               target="_blank"
                               rel="noopener noreferrer">
                                <span class="dashicons dashicons-star-filled"></span>
                                <?php esc_html_e( 'Get Versana PRO', 'versana-companion' ); ?>
                            </a>

                        <?php elseif ( $is_imported ) : ?>
                            <button type="button"
                                    class="button button-secondary versana-remove-demo"
                                    data-demo="<?php echo esc_attr( $demo_key ); ?>">
                                <span class="dashicons dashicons-trash"></span>
                                <?php esc_html_e( 'Remove', 'versana-companion' ); ?>
                            </button>

                        <?php elseif ( ! empty( $demo['xml_file'] ) && file_exists( $demo['xml_file'] ) ) : ?>
                            <button type="button"
                                    class="button button-primary versana-import-demo"
                                    data-demo="<?php echo esc_attr( $demo_key ); ?>">
                                <span class="dashicons dashicons-download"></span>
                                <?php esc_html_e( 'Import', 'versana-companion' ); ?>
                            </button>

                        <?php else : ?>
                            <button type="button" class="button" disabled>
                                <?php esc_html_e( 'File Missing', 'versana-companion' ); ?>
                            </button>
                        <?php endif; ?>
                    </div>

                </div><!-- .versana-demo-item -->
            <?php endforeach; ?>
        </div><!-- .versana-demo-library -->
    </div>
    <?php
}

/**
 * Render the PRO upsell banner shown above the demo grid.
 *
 * This is purely informational — no functionality is locked.
 *
 * @param string $purchase_url URL to the PRO purchase page.
 */
function versana_companion_render_pro_upsell_banner( $purchase_url ) {
    ?>
    <div class="versana-pro-notice">
        <div class="versana-pro-notice-content">
            <h3>
                <span class="dashicons dashicons-star-filled"></span>
                <?php esc_html_e( 'More Demos with Versana PRO', 'versana-companion' ); ?>
            </h3>
            <p>
                <?php esc_html_e( 'Unlock Restaurant, Fitness, Real Estate, WooCommerce Store, and more premium starter templates with the Versana PRO plugin.', 'versana-companion' ); ?>
            </p>
            <a href="<?php echo esc_url( $purchase_url ); ?>"
               class="button button-primary"
               target="_blank"
               rel="noopener noreferrer">
                <?php esc_html_e( 'Get Versana PRO', 'versana-companion' ); ?>
            </a>
            <a href="https://versana.codoplex.com/"
               class="button"
               target="_blank"
               rel="noopener noreferrer">
                <?php esc_html_e( 'Learn More', 'versana-companion' ); ?>
            </a>
        </div>
    </div>
    <?php
}

// ---------------------------------------------------------------------------
// Asset enqueueing
// ---------------------------------------------------------------------------

/**
 * Enqueue Demo Library assets on the theme options page.
 *
 * @param string $hook Current admin page hook.
 */
function versana_companion_enqueue_demo_library_assets( $hook ) {
    if ( 'appearance_page_versana-options' !== $hook ) {
        return;
    }

    wp_enqueue_style(
        'versana-companion-demo-library',
        VERSANA_COMPANION_URL . 'assets/css/demo-library.css',
        array(),
        VERSANA_COMPANION_VERSION
    );

    wp_enqueue_script(
        'versana-companion-demo-library',
        VERSANA_COMPANION_URL . 'assets/js/demo-library.js',
        array( 'jquery' ),
        VERSANA_COMPANION_VERSION,
        true
    );

    wp_localize_script(
        'versana-companion-demo-library',
        'versanaCompanion',
        array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'versana_companion_ajax' ),
            'strings' => array(
                'importing'     => __( 'Importing demo…', 'versana-companion' ),
                'removing'      => __( 'Removing demo…', 'versana-companion' ),
                'confirmImport' => __( 'This will import demo content and apply theme styling. Continue?', 'versana-companion' ),
                'confirmRemove' => __( 'This will permanently delete all imported demo content. Are you sure?', 'versana-companion' ),
                'success'       => __( 'Success!', 'versana-companion' ),
                'error'         => __( 'Error', 'versana-companion' ),
            ),
        )
    );
}
add_action( 'admin_enqueue_scripts', 'versana_companion_enqueue_demo_library_assets' );

// ---------------------------------------------------------------------------
// XML parsing & content import (free demos)
// ---------------------------------------------------------------------------

/**
 * Parse demo XML, substituting page-content placeholders for the chosen demo.
 *
 * @param string $xml_content Raw XML string.
 * @param string $demo_key    Demo identifier.
 * @return array|false Parsed data array or false on failure.
 */
function versana_companion_parse_demo_xml( $xml_content, $demo_key ) {
    $page_configs = versana_companion_get_demo_page_configs_filtered();
    $demo_config  = isset( $page_configs[ $demo_key ] ) ? $page_configs[ $demo_key ] : array();

    $replacements = array(
        '{HOME_CONTENT}'     => isset( $demo_config['home'] )     ? $demo_config['home']     : '',
        '{SERVICES_CONTENT}' => isset( $demo_config['services'] ) ? $demo_config['services'] : '',
        '{ABOUT_CONTENT}'    => isset( $demo_config['about'] )    ? $demo_config['about']    : '',
        '{CONTACT_CONTENT}'  => isset( $demo_config['contact'] )  ? $demo_config['contact']  : '',
    );

    foreach ( $replacements as $placeholder => $content ) {
        $xml_content = str_replace( $placeholder, $content, $xml_content );
    }

    libxml_use_internal_errors( true );
    $xml = simplexml_load_string( $xml_content );

    if ( false === $xml ) {
        return false;
    }

    $namespaces  = $xml->getNamespaces( true );
    $parsed_data = array(
        'title'      => (string) $xml->channel->title,
        'posts'      => array(),
        'pages'      => array(),
        'categories' => array(),
        'tags'       => array(),
    );

    foreach ( $xml->channel->item as $item ) {
        $wp      = $item->children( $namespaces['wp'] );
        $content = $item->children( $namespaces['content'] );
        $excerpt = $item->children( $namespaces['excerpt'] );

        $post_type     = (string) $wp->post_type;
        $page_template = (string) $wp->page_template;

        $item_data = array(
            'title'         => (string) $item->title,
            'content'       => (string) $content->encoded,
            'excerpt'       => (string) $excerpt->encoded,
            'post_type'     => $post_type,
            'status'        => (string) $wp->status,
            'post_name'     => (string) $wp->post_name,
            'post_date'     => (string) $wp->post_date,
            'page_template' => $page_template,
            'categories'    => array(),
            'tags'          => array(),
        );

        foreach ( $item->category as $category ) {
            $domain = (string) $category['domain'];
            $name   = (string) $category;

            if ( 'category' === $domain ) {
                $item_data['categories'][] = $name;
                if ( ! in_array( $name, $parsed_data['categories'], true ) ) {
                    $parsed_data['categories'][] = $name;
                }
            } elseif ( 'post_tag' === $domain ) {
                $item_data['tags'][] = $name;
                if ( ! in_array( $name, $parsed_data['tags'], true ) ) {
                    $parsed_data['tags'][] = $name;
                }
            }
        }

        if ( 'post' === $post_type ) {
            $parsed_data['posts'][] = $item_data;
        } elseif ( 'page' === $post_type ) {
            $parsed_data['pages'][] = $item_data;
        }
    }

    return $parsed_data;
}

/**
 * Import content from parsed XML data.
 *
 * @param array  $parsed_data   Data returned by versana_companion_parse_demo_xml().
 * @param string $demo_key      Demo identifier.
 * @param bool   $import_posts  Whether to import posts.
 * @param bool   $import_pages  Whether to import pages.
 * @return array Import results.
 */
function versana_companion_import_content( $parsed_data, $demo_key, $import_posts = true, $import_pages = true ) {
    $results = array(
        'success'       => true,
        'posts'         => array(),
        'pages'         => array(),
        'categories'    => array(),
        'tags'          => array(),
        'errors'        => array(),
        'skipped'       => array(),
        'front_page_id' => null,
    );

    if ( $import_posts ) {
        foreach ( $parsed_data['categories'] as $category_name ) {
            $cat_id = versana_companion_create_category( $category_name );
            if ( $cat_id ) {
                $results['categories'][] = $cat_id;
            }
        }

        foreach ( $parsed_data['tags'] as $tag_name ) {
            $tag_id = versana_companion_create_tag( $tag_name );
            if ( $tag_id ) {
                $results['tags'][] = $tag_id;
            }
        }

        foreach ( $parsed_data['posts'] as $post_data ) {
            if ( versana_companion_post_exists( $post_data['title'], 'post' ) ) {
                $results['skipped'][] = array( 'title' => $post_data['title'], 'type' => 'post' );
                continue;
            }

            $post_id = wp_insert_post( array(
                'post_title'   => $post_data['title'],
                'post_content' => $post_data['content'],
                'post_excerpt' => $post_data['excerpt'],
                'post_status'  => $post_data['status'],
                'post_type'    => 'post',
                'post_name'    => $post_data['post_name'],
                'post_author'  => get_current_user_id(),
            ), true );

            if ( is_wp_error( $post_id ) ) {
                $results['errors'][]  = array( 'title' => $post_data['title'], 'error' => $post_id->get_error_message() );
                $results['success']   = false;
            } else {
                $results['posts'][] = $post_id;

                if ( ! empty( $post_data['categories'] ) ) {
                    $cat_ids = array();
                    foreach ( $post_data['categories'] as $cat_name ) {
                        $term = get_term_by( 'name', $cat_name, 'category' );
                        if ( $term ) {
                            $cat_ids[] = $term->term_id;
                        }
                    }
                    if ( ! empty( $cat_ids ) ) {
                        wp_set_post_categories( $post_id, $cat_ids );
                    }
                }

                if ( ! empty( $post_data['tags'] ) ) {
                    wp_set_post_tags( $post_id, $post_data['tags'] );
                }
            }
        }
    }

    if ( $import_pages ) {
        foreach ( $parsed_data['pages'] as $page_data ) {
            $page_slug  = $page_data['post_name'];
            $page_title = $page_data['title'];

            if ( 'home' === $page_slug && versana_companion_post_exists( 'Home', 'page' ) ) {
                $page_slug  = $demo_key . '-home';
                $page_title = ucfirst( $demo_key ) . ' Home';
            }

            if ( versana_companion_post_exists( $page_title, 'page' ) ) {
                $results['skipped'][] = array( 'title' => $page_title, 'type' => 'page' );
                continue;
            }

            $page_id = wp_insert_post( array(
                'post_title'   => $page_title,
                'post_content' => $page_data['content'],
                'post_status'  => $page_data['status'],
                'post_type'    => 'page',
                'post_name'    => $page_slug,
                'post_author'  => get_current_user_id(),
            ), true );

            if ( is_wp_error( $page_id ) ) {
                $results['errors'][]  = array( 'title' => $page_title, 'error' => $page_id->get_error_message() );
                $results['success']   = false;
            } else {
                $results['pages'][] = $page_id;

                if ( ! empty( $page_data['page_template'] ) ) {
                    update_post_meta( $page_id, '_wp_page_template', $page_data['page_template'] );
                }

                if ( ! empty( $page_data['page_template'] ) && 'full-width' === $page_data['page_template'] ) {
                    $results['front_page_id'] = $page_id;
                }
            }
        }
    }

    return $results;
}

// ---------------------------------------------------------------------------
// Taxonomy helpers
// ---------------------------------------------------------------------------

/** @return int|false */
function versana_companion_create_category( $category_name ) {
    $term = get_term_by( 'name', $category_name, 'category' );
    if ( $term ) {
        return $term->term_id;
    }
    $result = wp_insert_term( $category_name, 'category' );
    return is_wp_error( $result ) ? false : $result['term_id'];
}

/** @return int|false */
function versana_companion_create_tag( $tag_name ) {
    $term = get_term_by( 'name', $tag_name, 'post_tag' );
    if ( $term ) {
        return $term->term_id;
    }
    $result = wp_insert_term( $tag_name, 'post_tag' );
    return is_wp_error( $result ) ? false : $result['term_id'];
}

/** @return bool */
function versana_companion_post_exists( $title, $post_type = 'post' ) {
    $posts = get_posts( array(
        'title'                  => $title,
        'post_type'              => $post_type,
        'post_status'            => array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit' ),
        'posts_per_page'         => 1,
        'fields'                 => 'ids',
        'no_found_rows'          => true,
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
    ) );
    return ! empty( $posts );
}

// ---------------------------------------------------------------------------
// Navigation menu
// ---------------------------------------------------------------------------

/**
 * Create or update the "Versana Menu" wp_navigation post.
 *
 * @param int[]  $page_ids Array of imported page IDs.
 * @param string $demo_key Demo identifier.
 * @return int|false Navigation post ID or false on failure.
 */
function versana_companion_create_demo_menu( $page_ids, $demo_key ) {
    $menu_title = 'Versana Menu';
    $existing   = get_posts( array(
        'post_type'   => 'wp_navigation',
        'title'       => $menu_title,
        'numberposts' => 1,
    ) );

    $inner_blocks = '';

    $home_page_id = get_option( 'page_on_front' );
    if ( ! empty( $home_page_id ) && 'publish' === get_post_status( $home_page_id ) ) {
        $inner_blocks .= sprintf(
            '<!-- wp:navigation-link {"label":"Home","type":"page","id":%d,"url":"%s"} /-->' . "\n",
            intval( $home_page_id ),
            esc_url( get_permalink( $home_page_id ) )
        );
    }

    $allowed = array( 'Services', 'About', 'Contact' );
    foreach ( $page_ids as $page_id ) {
        $page = get_post( $page_id );
        if ( $page && 'publish' === $page->post_status && in_array( $page->post_title, $allowed, true ) ) {
            $inner_blocks .= sprintf(
                '<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"url":"%s"} /-->' . "\n",
                esc_html( $page->post_title ),
                intval( $page_id ),
                esc_url( get_permalink( $page_id ) )
            );
        }
    }

    $blog_page_id = get_option( 'page_for_posts' );
    if ( ! empty( $blog_page_id ) && 'publish' === get_post_status( $blog_page_id ) ) {
        $inner_blocks .= sprintf(
            '<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"url":"%s"} /-->' . "\n",
            esc_html( get_the_title( $blog_page_id ) ),
            intval( $blog_page_id ),
            esc_url( get_permalink( $blog_page_id ) )
        );
    }

    if ( ! empty( $existing ) ) {
        $nav_id = $existing[0]->ID;
        wp_update_post( array( 'ID' => $nav_id, 'post_content' => $inner_blocks ) );
    } else {
        $nav_id = wp_insert_post( array(
            'post_title'   => $menu_title,
            'post_status'  => 'publish',
            'post_type'    => 'wp_navigation',
            'post_content' => $inner_blocks,
        ) );
    }

    if ( is_wp_error( $nav_id ) ) {
        return false;
    }

    $header = get_posts( array(
        'post_type'   => 'wp_template_part',
        'name'        => 'header',
        'numberposts' => 1,
    ) );

    if ( ! empty( $header ) ) {
        $content = str_replace(
            '"ref":0',
            '"ref":' . intval( $nav_id ),
            $header[0]->post_content
        );
        wp_update_post( array(
            'ID'           => $header[0]->ID,
            'post_content' => $content,
        ) );
    }

    return $nav_id;
}

// ---------------------------------------------------------------------------
// Reading settings & blog page
// ---------------------------------------------------------------------------

/**
 * Set the front page and blog page options after import.
 *
 * @param int[]       $page_ids     Imported page IDs.
 * @param string      $demo_key     Demo identifier.
 * @param int|null    $front_page_id Specific front page ID (optional).
 * @return bool
 */
function versana_companion_set_reading_settings( $page_ids, $demo_key, $front_page_id = null ) {
    if ( empty( $page_ids ) ) {
        return false;
    }

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id ? $front_page_id : $page_ids[0] );

    $blog_page_id = versana_companion_create_blog_page();
    if ( $blog_page_id ) {
        update_option( 'page_for_posts', $blog_page_id );
    }

    return true;
}

/**
 * Create (or find) the Blog page.
 *
 * @return int|false
 */
function versana_companion_create_blog_page() {
    $existing = get_page_by_path( 'blog' );
    if ( $existing ) {
        return $existing->ID;
    }

    $page_id = wp_insert_post( array(
        'post_title'  => 'Blog',
        'post_content' => '',
        'post_status' => 'publish',
        'post_type'   => 'page',
        'post_name'   => 'blog',
    ), true );

    if ( is_wp_error( $page_id ) ) {
        return false;
    }

    update_option( 'show_on_front', 'page' );
    update_option( 'page_for_posts', $page_id );

    return $page_id;
}

// ---------------------------------------------------------------------------
// Page content configurations
// ---------------------------------------------------------------------------

/**
 * Default page-content pattern configurations for each free demo.
 *
 * @return array
 */
function versana_companion_get_demo_page_configs() {
    return array(
        'blog' => array(
            'home'     => '<!-- wp:pattern {"slug":"versana/blog-hero"} /-->
                          <!-- wp:pattern {"slug":"versana/blog-grid-3-column"} /-->
                          <!-- wp:pattern {"slug":"versana/features-3-column-icons"} /-->
                          <!-- wp:pattern {"slug":"versana/testimonials-2-column"} /-->
                          <!-- wp:pattern {"slug":"versana/newsletter-centered"} /-->
                          <!-- wp:pattern {"slug":"versana/cta-split"} /-->
                          <!-- wp:pattern {"slug":"versana/about"} /-->
                          <!-- wp:pattern {"slug":"versana/stats-4-column"} /-->
                          <!-- wp:pattern {"slug":"versana/team-3-column"} /-->
                          <!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/our-services"} /-->',
            'about'    => '<!-- wp:pattern {"slug":"versana/about"} /-->
                          <!-- wp:pattern {"slug":"versana/stats-4-column"} /-->
                          <!-- wp:pattern {"slug":"versana/team-3-column"} /-->',
            'contact'  => '<!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
        ),
        'business' => array(
            'home'     => '<!-- wp:pattern {"slug":"versana/hero-business-gradient"} /-->
                          <!-- wp:pattern {"slug":"versana/features-3-column-icons"} /-->
                          <!-- wp:pattern {"slug":"versana/stats-4-column"} /-->
                          <!-- wp:pattern {"slug":"versana/business-services"} /-->
                          <!-- wp:pattern {"slug":"versana/process-timeline-4-step"} /-->
                          <!-- wp:pattern {"slug":"versana/client-logos-grid"} /-->
                          <!-- wp:pattern {"slug":"versana/testimonials-2-column"} /-->
                          <!-- wp:pattern {"slug":"versana/pricing-3-column"} /-->
                          <!-- wp:pattern {"slug":"versana/team-3-column"} /-->
                          <!-- wp:pattern {"slug":"versana/faq-section"} /-->
                          <!-- wp:pattern {"slug":"versana/business-about"} /-->
                          <!-- wp:pattern {"slug":"versana/cta-split"} /-->
                          <!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/business-services"} /-->
                          <!-- wp:pattern {"slug":"versana/process-timeline-4-step"} /-->
                          <!-- wp:pattern {"slug":"versana/testimonials-2-column"} /-->',
            'about'    => '<!-- wp:pattern {"slug":"versana/business-about"} /-->
                          <!-- wp:pattern {"slug":"versana/team-3-column"} /-->
                          <!-- wp:pattern {"slug":"versana/stats-4-column"} /-->
                          <!-- wp:pattern {"slug":"versana/client-logos-grid"} /-->',
            'contact'  => '<!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
        ),
        'portfolio' => array(
            'home'     => '<!-- wp:pattern {"slug":"versana/portfolio-hero"} /-->
                          <!-- wp:pattern {"slug":"versana/portfolio-gallery-grid"} /-->
                          <!-- wp:pattern {"slug":"versana/features-3-column-icons"} /-->
                          <!-- wp:pattern {"slug":"versana/testimonials-2-column"} /-->
                          <!-- wp:pattern {"slug":"versana/stats-4-column"} /-->
                          <!-- wp:pattern {"slug":"versana/portfolio-about"} /-->
                          <!-- wp:pattern {"slug":"versana/cta-split"} /-->
                          <!-- wp:pattern {"slug":"versana/case-study-detail"} /-->
                          <!-- wp:pattern {"slug":"versana/team-3-column"} /-->
                          <!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/our-services"} /-->',
            'about'    => '<!-- wp:pattern {"slug":"versana/portfolio-about"} /-->
                          <!-- wp:pattern {"slug":"versana/case-study-detail"} /-->
                          <!-- wp:pattern {"slug":"versana/team-3-column"} /-->',
            'contact'  => '<!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
        ),
        'boutique' => array(
            'home' => '<!-- wp:pattern {"slug":"versana/boutique-hero-fullscreen"} /-->
                    <!-- wp:pattern {"slug":"versana/boutique-product-grid"} /-->
                    <!-- wp:pattern {"slug":"versana/boutique-lookbook"} /-->
                    <!-- wp:pattern {"slug":"versana/testimonials-slider"} /-->
                    <!-- wp:pattern {"slug":"versana/boutique-instagram-feed"} /-->
                    <!-- wp:pattern {"slug":"versana/cta-split"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/boutique-product-grid"} /-->
                    <!-- wp:pattern {"slug":"versana/boutique-size-guide"} /-->',
            'about' => '<!-- wp:pattern {"slug":"versana/about"} /-->
                    <!-- wp:pattern {"slug":"versana/team-3-column"} /-->',
            'contact' => '<!-- wp:pattern {"slug":"versana/contact-split-section"} /-->',
        ),
    );
}

/**
 * Get page configurations, allowing the PRO plugin to add its own.
 *
 * @return array
 */
function versana_companion_get_demo_page_configs_filtered() {
    /**
     * Filter: versana_companion_page_configs
     *
     * @param array $configs Existing configurations.
     * @return array
     */
    return apply_filters( 'versana_companion_page_configs', versana_companion_get_demo_page_configs() );
}

// ---------------------------------------------------------------------------
// Import / Remove data persistence
// ---------------------------------------------------------------------------

/**
 * Persist import metadata to the database.
 *
 * @param string $demo_key       Demo identifier.
 * @param array  $import_results Results from versana_companion_import_content().
 * @return bool
 */
function versana_companion_save_import_data( $demo_key, $import_results ) {
    $import_data = array(
        'demo_key'     => $demo_key,
        'posts'        => $import_results['posts'],
        'pages'        => $import_results['pages'],
        'categories'   => $import_results['categories'],
        'tags'         => $import_results['tags'],
        'menu_id'      => isset( $import_results['menu_id'] ) ? $import_results['menu_id'] : 0,
        'blog_page_id' => isset( $import_results['blog_page_id'] ) ? $import_results['blog_page_id'] : 0,
        'import_date'  => current_time( 'mysql' ),
    );
    update_option( 'versana_imported_demo_data', $import_data );
    return true;
}

/** @return array|false */
function versana_companion_get_import_data() {
    return get_option( 'versana_imported_demo_data', false );
}

/** @return array|null */
function versana_companion_get_demo( $demo_key ) {
    $demos = versana_companion_get_available_demos();
    return isset( $demos[ $demo_key ] ) ? $demos[ $demo_key ] : null;
}

// ---------------------------------------------------------------------------
// AJAX: Import demo
// ---------------------------------------------------------------------------

/**
 * AJAX handler: import a free demo.
 *
 * PRO demo stubs have no xml_file, so they will fail gracefully if someone
 * tries to call this endpoint for them directly.
 */
function versana_companion_ajax_import_demo() {
    check_ajax_referer( 'versana_companion_ajax', 'nonce' );

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'Insufficient permissions.', 'versana-companion' ) ) );
    }

    $demo_key     = isset( $_POST['demo_key'] ) ? sanitize_key( $_POST['demo_key'] ) : '';
    $import_posts = isset( $_POST['import_posts'] ) && 'true' === $_POST['import_posts'];
    $import_pages = isset( $_POST['import_pages'] ) && 'true' === $_POST['import_pages'];
    $import_menu  = isset( $_POST['import_menu'] )  && 'true' === $_POST['import_menu'];

    if ( empty( $demo_key ) ) {
        wp_send_json_error( array( 'message' => __( 'Invalid demo selected.', 'versana-companion' ) ) );
    }

    $demo = versana_companion_get_demo( $demo_key );

    if ( ! $demo ) {
        wp_send_json_error( array( 'message' => __( 'Demo not found.', 'versana-companion' ) ) );
    }

    // PRO teaser stubs have no xml_file — they cannot be imported here.
    if ( ! empty( $demo['is_pro'] ) && empty( $demo['xml_file'] ) ) {
        wp_send_json_error( array(
            'message'      => __( 'This is a PRO demo. Please install the Versana PRO plugin to import it.', 'versana-companion' ),
            'purchase_url' => isset( $demo['purchase_url'] ) ? $demo['purchase_url'] : 'https://versana.codoplex.com/get-versana-pro/',
        ) );
    }

    if ( empty( $demo['xml_file'] ) || ! file_exists( $demo['xml_file'] ) ) {
        wp_send_json_error( array( 'message' => __( 'Demo file not found.', 'versana-companion' ) ) );
    }

    // Check plugin dependencies (e.g. WooCommerce).
    if ( ! empty( $demo['dependencies'] ) ) {
        $check = versana_companion_check_required_plugins( $demo['dependencies'] );
        if ( ! $check['all_active'] ) {
            $missing  = array_merge( $check['missing'], $check['inactive'] );
            wp_send_json_error( array(
                'message' => __( 'Required plugins are not active: ', 'versana-companion' ) . implode( ', ', $missing ),
            ) );
        }
    }

    $xml_content = file_get_contents( $demo['xml_file'] ); // phpcs:ignore WordPress.WP.AlternativeFunctions
    if ( false === $xml_content ) {
        wp_send_json_error( array( 'message' => __( 'Could not read demo file.', 'versana-companion' ) ) );
    }

    $parsed_data = versana_companion_parse_demo_xml( $xml_content, $demo_key );
    if ( false === $parsed_data ) {
        wp_send_json_error( array( 'message' => __( 'Could not parse demo file.', 'versana-companion' ) ) );
    }

    $import_results = versana_companion_import_content( $parsed_data, $demo_key, $import_posts, $import_pages );

    if ( ! $import_results['success'] ) {
        wp_send_json_error( array( 'message' => __( 'Import completed with errors.', 'versana-companion' ) ) );
    }

    if ( $import_pages ) {
        versana_companion_set_reading_settings(
            $import_results['pages'],
            $demo_key,
            isset( $import_results['front_page_id'] ) ? $import_results['front_page_id'] : null
        );
    }

    if ( $import_menu && ! empty( $import_results['pages'] ) ) {
        $menu_id                   = versana_companion_create_demo_menu( $import_results['pages'], $demo_key );
        $import_results['menu_id'] = $menu_id;
    }

    $blog_page = get_page_by_path( 'blog' );
    if ( $blog_page ) {
        $import_results['blog_page_id'] = $blog_page->ID;
    }

    versana_companion_save_import_data( $demo_key, $import_results );
    update_option( 'versana_active_demo', $demo_key );

    $imported_items = array();
    if ( $import_posts ) {
        /* translators: %d: number of posts imported */
        $imported_items[] = sprintf( _n( '%d post', '%d posts', count( $import_results['posts'] ), 'versana-companion' ), count( $import_results['posts'] ) );
    }
    if ( $import_pages ) {
        /* translators: %d: number of pages imported */
        $imported_items[] = sprintf( _n( '%d page', '%d pages', count( $import_results['pages'] ), 'versana-companion' ), count( $import_results['pages'] ) );
    }
    if ( $import_menu ) {
        $imported_items[] = __( 'navigation menu', 'versana-companion' );
    }

    $message = sprintf(
        /* translators: %s: comma-separated list of imported item types */
        __( 'Demo imported successfully! Created %s.', 'versana-companion' ),
        implode( ', ', $imported_items )
    );

    if ( ! empty( $import_results['skipped'] ) ) {
        $message .= ' ' . sprintf(
            /* translators: %d: number of items skipped */
            _n( 'Skipped %d existing item.', 'Skipped %d existing items.', count( $import_results['skipped'] ), 'versana-companion' ),
            count( $import_results['skipped'] )
        );
    }

    /**
     * Action: versana_companion_demo_imported
     *
     * @param string $demo_key       Demo identifier.
     * @param array  $import_results Import results.
     *
     * @since 1.0.0
     */
    do_action( 'versana_companion_demo_imported', $demo_key, $import_results );

    wp_send_json_success( array( 'message' => $message, 'demo_key' => $demo_key ) );
}
add_action( 'wp_ajax_versana_import_demo', 'versana_companion_ajax_import_demo' );

// ---------------------------------------------------------------------------
// AJAX: Remove demo
// ---------------------------------------------------------------------------

/**
 * AJAX handler: remove previously imported demo content.
 */
function versana_companion_ajax_remove_demo() {
    check_ajax_referer( 'versana_companion_ajax', 'nonce' );

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'Insufficient permissions.', 'versana-companion' ) ) );
    }

    $remove_posts = isset( $_POST['remove_posts'] ) && 'true' === $_POST['remove_posts'];
    $remove_pages = isset( $_POST['remove_pages'] ) && 'true' === $_POST['remove_pages'];
    $remove_menu  = isset( $_POST['remove_menu'] )  && 'true' === $_POST['remove_menu'];

    $import_data = versana_companion_get_import_data();
    if ( ! $import_data ) {
        wp_send_json_error( array( 'message' => __( 'No imported demo found.', 'versana-companion' ) ) );
    }

    $deleted = array( 'posts' => 0, 'pages' => 0 );

    if ( $remove_posts ) {
        foreach ( $import_data['posts'] as $post_id ) {
            if ( wp_delete_post( $post_id, true ) ) {
                $deleted['posts']++;
            }
        }
        foreach ( $import_data['categories'] as $cat_id ) {
            if ( get_term( $cat_id, 'category' ) ) {
                wp_delete_term( $cat_id, 'category' );
            }
        }
        foreach ( $import_data['tags'] as $tag_id ) {
            if ( get_term( $tag_id, 'post_tag' ) ) {
                wp_delete_term( $tag_id, 'post_tag' );
            }
        }
    }

    if ( $remove_pages ) {
        foreach ( $import_data['pages'] as $page_id ) {
            if ( wp_delete_post( $page_id, true ) ) {
                $deleted['pages']++;
            }
        }
        if ( ! empty( $import_data['blog_page_id'] ) ) {
            wp_delete_post( $import_data['blog_page_id'], true );
        }
        update_option( 'show_on_front', 'posts' );
        delete_option( 'page_on_front' );
        delete_option( 'page_for_posts' );
    }

    if ( $remove_menu && ! empty( $import_data['menu_id'] ) ) {
        $menu_id = intval( $import_data['menu_id'] );
        if ( 'wp_navigation' === get_post_type( $menu_id ) ) {
            wp_delete_post( $menu_id, true );
        }
    }

    delete_option( 'versana_active_demo' );
    delete_option( 'versana_imported_demo_data' );

    $removed_items = array();
    if ( $remove_posts ) {
        $removed_items[] = sprintf(
            /* translators: %d: number of posts removed */
            _n( '%d post', '%d posts', $deleted['posts'], 'versana-companion' ),
            $deleted['posts']
        );
    }
    if ( $remove_pages ) {
        $removed_items[] = sprintf(
            /* translators: %d: number of pages removed */
            _n( '%d page', '%d pages', $deleted['pages'], 'versana-companion' ),
            $deleted['pages']
        );
    }
    if ( $remove_menu ) {
        $removed_items[] = __( 'menu', 'versana-companion' );
    }

    wp_send_json_success( array(
        'message' => sprintf(
            /* translators: %s: comma-separated list of removed item types */
            __( 'Demo content removed! Deleted %s.', 'versana-companion' ),
            implode( ', ', $removed_items )
        ),
    ) );
}
add_action( 'wp_ajax_versana_remove_demo', 'versana_companion_ajax_remove_demo' );

// ---------------------------------------------------------------------------
// Theme JSON variation (active demo style)
// ---------------------------------------------------------------------------

/**
 * Inject the active demo's style variation into theme.json at runtime.
 *
 * @param WP_Theme_JSON_Data $theme_json
 * @return WP_Theme_JSON_Data
 */
function versana_apply_demo_variation_filter( $theme_json ) {
    $active_variation = get_option( 'versana_active_demo' );
    if ( ! $active_variation ) {
        return $theme_json;
    }

    $file_path = get_template_directory() . '/styles/' . $active_variation . '.json';
    if ( file_exists( $file_path ) ) {
        $content = file_get_contents( $file_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions
        $decoded = json_decode( $content, true );
        if ( is_array( $decoded ) ) {
            $theme_json->update_with( $decoded );
        }
    }

    return $theme_json;
}

// ---------------------------------------------------------------------------
// Stub: versana_companion_is_pro_active()
// ---------------------------------------------------------------------------

if ( ! function_exists( 'versana_companion_is_pro_active' ) ) {
    /**
     * Check whether the Versana PRO plugin is active.
     *
     * This function returns false in the free Companion plugin.
     * The Versana PRO plugin overrides it to return true after license
     * verification, which the demo-library JS and PRO-specific filters
     * use to unlock PRO demo import.
     *
     * @return bool
     */
    function versana_companion_is_pro_active() {
        /**
         * Filter: versana_companion_pro_active
         *
         * The Versana PRO plugin sets this to true.
         *
         * @param bool $active Default false in free plugin.
         * @return bool
         */
        return (bool) apply_filters( 'versana_companion_pro_active', false );
    }
}