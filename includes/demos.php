<?php
/**
 * Versana Theme Demos
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get available demos with configurations
 */
function versana_companion_get_available_demos() {
    $demos = array(
        'blog' => array(
            'name'        => __( 'Personal Blog', 'versana-companion' ),
            'description' => __( 'Clean and minimal blog layout perfect for writers and content creators.', 'versana-companion' ),
            'preview_url' => 'https://demos.codoplex.com/versana/blog/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/blog.jpg',
            'xml_file'    => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'    => 'blog',
            'tags'        => array( 'blog', 'minimal', 'writer' ),
            'theme_config' => array(
                'colors' => array(
                    'primary'   => '#E91E63',
                    'secondary' => '#FF9800',
                    'tertiary'  => '#9C27B0',
                ),
                'gradient' => 'warm-gradient',
            ),
        ),
        'business' => array(
            'name'        => __( 'Business Website', 'versana-companion' ),
            'description' => __( 'Professional business website perfect for corporate sites and agencies.', 'versana-companion' ),
            'preview_url' => 'https://demos.codoplex.com/versana/business/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/business.jpg',
            'xml_file'    => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'    => 'business',
            'tags'        => array( 'business', 'corporate', 'professional' ),
            'theme_config' => array(
                'colors' => array(
                    'primary'   => '#1A73E8',
                    'secondary' => '#2196F3',
                    'tertiary'  => '#0D47A1',
                ),
                'gradient' => 'primary-gradient',
            ),
        ),
        'portfolio' => array(
            'name'        => __( 'Creative Portfolio', 'versana-companion' ),
            'description' => __( 'Showcase your work with a beautiful portfolio layout for creatives.', 'versana-companion' ),
            'preview_url' => 'https://demos.codoplex.com/versana/portfolio/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/portfolio.jpg',
            'xml_file'    => VERSANA_COMPANION_PATH . 'includes/content.xml',
            'category'    => 'portfolio',
            'tags'        => array( 'portfolio', 'creative', 'showcase' ),
            'theme_config' => array(
                'colors' => array(
                    'primary'   => '#9C27B0',
                    'secondary' => '#E91E63',
                    'tertiary'  => '#673AB7',
                ),
                'gradient' => 'primary-gradient',
            ),
        ),
    );
    
    return apply_filters( 'versana_companion_available_demos', $demos );
}

/**
 * Add Companion tabs to theme options
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

/**
 * Render Demo Import tab
 */
function versana_companion_render_demo_import_tab() {
    $imported_demo = versana_companion_get_import_data();
    $demos = versana_companion_get_available_demos();
    
    ?>
    <div class="versana-tab-content">
        <h2><?php esc_html_e( 'Import Demo Content', 'versana-companion' ); ?></h2>
        
        <div id="versana-import-notices"></div>
        
        <?php if ( $imported_demo ) : ?>
            <div class="notice notice-info">
                <p>
                    <strong><?php esc_html_e( 'Demo Currently Imported:', 'versana-companion' ); ?></strong>
                    <?php echo esc_html( ucfirst( $imported_demo['demo_key'] ) ); ?>
                    <?php esc_html_e( 'demo imported on', 'versana-companion' ); ?>
                    <?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $imported_demo['import_date'] ) ) ); ?>
                </p>
                <p>
                    <?php
                    printf(
                        esc_html__( 'Includes %d posts, %d pages, and navigation menu.', 'versana-companion' ),
                        count( $imported_demo['posts'] ),
                        count( $imported_demo['pages'] )
                    );
                    ?>
                </p>
            </div>
        <?php endif; ?>
        
        <p class="description">
            <?php esc_html_e( 'Choose a demo to import. This will add sample posts, pages, create navigation menus, and apply theme styling.', 'versana-companion' ); ?>
        </p>
        
        <?php if ( $imported_demo ) : ?>
            <p class="description">
                <strong><?php esc_html_e( 'Note:', 'versana-companion' ); ?></strong>
                <?php esc_html_e( 'You can import a different demo. Previous demo content will remain unless you remove it first.', 'versana-companion' ); ?>
            </p>
        <?php endif; ?>
        
        <div class="versana-demo-library">
            <?php foreach ( $demos as $demo_key => $demo ) : ?>
                <div class="versana-demo-item <?php echo $imported_demo && $imported_demo['demo_key'] === $demo_key ? 'demo-imported' : ''; ?>" data-demo="<?php echo esc_attr( $demo_key ); ?>">
                    <div class="demo-thumbnail">
                        <?php if ( ! empty( $demo['thumbnail'] ) && file_exists( str_replace( VERSANA_COMPANION_URL, VERSANA_COMPANION_PATH, $demo['thumbnail'] ) ) ) : ?>
                            <img src="<?php echo esc_url( $demo['thumbnail'] ); ?>" 
                                 alt="<?php echo esc_attr( $demo['name'] ); ?>">
                        <?php else : ?>
                            <div class="demo-thumbnail-placeholder">
                                <svg width="100%" height="100%" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="800" height="600" fill="#f5f5f5"/>
                                    <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="24" fill="#999" text-anchor="middle" dominant-baseline="middle">
                                        <?php echo esc_html( $demo['name'] ); ?>
                                    </text>
                                </svg>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $imported_demo && $imported_demo['demo_key'] === $demo_key ) : ?>
                            <div class="demo-imported-badge">
                                <span class="dashicons dashicons-yes-alt"></span>
                                <?php esc_html_e( 'Imported', 'versana-companion' ); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="demo-progress" style="display:none;">
                            <div class="demo-progress-bar">
                                <div class="demo-progress-fill"></div>
                            </div>
                            <div class="demo-progress-text"></div>
                        </div>
                    </div>
                    
                    <div class="demo-info">
                        <h3 class="demo-name"><?php echo esc_html( $demo['name'] ); ?></h3>
                        <p class="demo-description"><?php echo esc_html( $demo['description'] ); ?></p>
                    </div>
                    
                    <div class="demo-actions">
                        <?php if ( ! empty( $demo['preview_url'] ) ) : ?>
                            <a href="<?php echo esc_url( $demo['preview_url'] ); ?>" 
                               class="button" 
                               target="_blank">
                                <span class="dashicons dashicons-visibility"></span>
                                <?php esc_html_e( 'Preview', 'versana-companion' ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( $imported_demo && $imported_demo['demo_key'] === $demo_key ) : ?>
                            <button type="button"
                                    class="button button-secondary versana-remove-demo"
                                    data-demo="<?php echo esc_attr( $demo_key ); ?>">
                                <span class="dashicons dashicons-trash"></span>
                                <?php esc_html_e( 'Remove', 'versana-companion' ); ?>
                            </button>
                        <?php else : ?>
                            <?php if ( file_exists( $demo['xml_file'] ) ) : ?>
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
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

/**
 * Enqueue demo library assets
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
                'importing'     => __( 'Importing demo...', 'versana-companion' ),
                'removing'      => __( 'Removing demo...', 'versana-companion' ),
                'confirmImport' => __( 'This will import demo content and apply theme styling. Continue?', 'versana-companion' ),
                'confirmRemove' => __( 'This will permanently delete all imported demo content. Are you sure?', 'versana-companion' ),
                'success'       => __( 'Success!', 'versana-companion' ),
                'error'         => __( 'Error', 'versana-companion' ),
            ),
        )
    );
}
add_action( 'admin_enqueue_scripts', 'versana_companion_enqueue_demo_library_assets' );

/**
 * Parse demo XML and replace placeholders with demo-specific content
 */
function versana_companion_parse_demo_xml( $xml_content, $demo_key ) {
    // Get page content configurations
    $page_configs = versana_companion_get_demo_page_configs();
    $demo_config = isset( $page_configs[ $demo_key ] ) ? $page_configs[ $demo_key ] : array();
    
    // Replace content placeholders
    $replacements = array(
        '{HOME_CONTENT}'     => isset( $demo_config['home'] ) ? $demo_config['home'] : '',
        '{SERVICES_CONTENT}' => isset( $demo_config['services'] ) ? $demo_config['services'] : '',
        '{ABOUT_CONTENT}'    => isset( $demo_config['about'] ) ? $demo_config['about'] : '',
    );
    
    foreach ( $replacements as $placeholder => $content ) {
        $xml_content = str_replace( $placeholder, $content, $xml_content );
    }
    
    libxml_use_internal_errors( true );
    
    $xml = simplexml_load_string( $xml_content );
    
    if ( $xml === false ) {
        return false;
    }
    
    $namespaces = $xml->getNamespaces( true );
    
    $parsed_data = array(
        'title'      => (string) $xml->channel->title,
        'posts'      => array(),
        'pages'      => array(),
        'categories' => array(),
        'tags'       => array(),
    );
    
    foreach ( $xml->channel->item as $item ) {
        $wp = $item->children( $namespaces['wp'] );
        $content = $item->children( $namespaces['content'] );
        $excerpt = $item->children( $namespaces['excerpt'] );
        
        $post_type = (string) $wp->post_type;
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
            $name = (string) $category;
            
            if ( $domain === 'category' ) {
                $item_data['categories'][] = $name;
                if ( ! in_array( $name, $parsed_data['categories'] ) ) {
                    $parsed_data['categories'][] = $name;
                }
            } elseif ( $domain === 'post_tag' ) {
                $item_data['tags'][] = $name;
                if ( ! in_array( $name, $parsed_data['tags'] ) ) {
                    $parsed_data['tags'][] = $name;
                }
            }
        }
        
        if ( $post_type === 'post' ) {
            $parsed_data['posts'][] = $item_data;
        } elseif ( $post_type === 'page' ) {
            $parsed_data['pages'][] = $item_data;
        }
    }
    
    return $parsed_data;
}

/**
 * Import content from parsed data
 */
function versana_companion_import_content( $parsed_data, $demo_key ) {
    $results = array(
        'success'        => true,
        'posts'          => array(),
        'pages'          => array(),
        'categories'     => array(),
        'tags'           => array(),
        'errors'         => array(),
        'skipped'        => array(),
        'front_page_id'  => null,
    );
    
    // Create categories
    foreach ( $parsed_data['categories'] as $category_name ) {
        $cat_id = versana_companion_create_category( $category_name );
        if ( $cat_id ) {
            $results['categories'][] = $cat_id;
        }
    }
    
    // Create tags
    foreach ( $parsed_data['tags'] as $tag_name ) {
        $tag_id = versana_companion_create_tag( $tag_name );
        if ( $tag_id ) {
            $results['tags'][] = $tag_id;
        }
    }
    
    // Import posts
    foreach ( $parsed_data['posts'] as $post_data ) {
        if ( versana_companion_post_exists( $post_data['title'], 'post' ) ) {
            $results['skipped'][] = array(
                'title' => $post_data['title'],
                'type'  => 'post',
            );
            continue;
        }

        $post_args = array(
            'post_title'   => $post_data['title'],
            'post_content' => $post_data['content'],
            'post_excerpt' => $post_data['excerpt'],
            'post_status'  => $post_data['status'],
            'post_type'    => 'post',
            'post_name'    => $post_data['post_name'],
            'post_author'  => get_current_user_id(),
        );
        
        $post_id = wp_insert_post( $post_args, true );
        
        if ( is_wp_error( $post_id ) ) {
            $results['errors'][] = array(
                'title' => $post_data['title'],
                'error' => $post_id->get_error_message(),
            );
            $results['success'] = false;
        } else {
            $results['posts'][] = $post_id;
            
            if ( ! empty( $post_data['categories'] ) ) {
                $category_ids = array();
                foreach ( $post_data['categories'] as $cat_name ) {
                    $term = get_term_by( 'name', $cat_name, 'category' );
                    if ( $term ) {
                        $category_ids[] = $term->term_id;
                    }
                }
                if ( ! empty( $category_ids ) ) {
                    wp_set_post_categories( $post_id, $category_ids );
                }
            }
            
            if ( ! empty( $post_data['tags'] ) ) {
                wp_set_post_tags( $post_id, $post_data['tags'] );
            }
        }
    }
    
    // Import pages
    foreach ( $parsed_data['pages'] as $page_data ) {
        $page_slug = $page_data['post_name'];
        $page_title = $page_data['title'];
        
        // Handle home page slug conflicts
        if ( $page_slug === 'home' && versana_companion_post_exists( 'Home', 'page' ) ) {
            $page_slug = $demo_key . '-home';
            $page_title = ucfirst( $demo_key ) . ' Home';
        }
        
        if ( versana_companion_post_exists( $page_title, 'page' ) ) {
            $results['skipped'][] = array(
                'title' => $page_title,
                'type'  => 'page',
            );
            continue;
        }
        
        $page_args = array(
            'post_title'   => $page_title,
            'post_content' => $page_data['content'],
            'post_status'  => $page_data['status'],
            'post_type'    => 'page',
            'post_name'    => $page_slug,
            'post_author'  => get_current_user_id(),
        );
        
        $page_id = wp_insert_post( $page_args, true );
        
        if ( is_wp_error( $page_id ) ) {
            $results['errors'][] = array(
                'title' => $page_title,
                'error' => $page_id->get_error_message(),
            );
            $results['success'] = false;
        } else {
            $results['pages'][] = $page_id;
            if ( ! empty( $page_data['page_template'] )){
                update_post_meta( $page_id, '_wp_page_template', $page_data['page_template'] );
            }
            if ( ! empty( $page_data['page_template'] ) && $page_data['page_template'] === 'full-width' ) {
                $results['front_page_id'] = $page_id;
            }
        }
    }
    
    return $results;
}

/**
 * Create category if doesn't exist
 */
function versana_companion_create_category( $category_name ) {
    $term = get_term_by( 'name', $category_name, 'category' );
    
    if ( $term ) {
        return $term->term_id;
    }
    
    $result = wp_insert_term( $category_name, 'category' );
    
    if ( is_wp_error( $result ) ) {
        return false;
    }
    
    return $result['term_id'];
}

/**
 * Create tag if doesn't exist
 */
function versana_companion_create_tag( $tag_name ) {
    $term = get_term_by( 'name', $tag_name, 'post_tag' );
    
    if ( $term ) {
        return $term->term_id;
    }
    
    $result = wp_insert_term( $tag_name, 'post_tag' );
    
    if ( is_wp_error( $result ) ) {
        return false;
    }
    
    return $result['term_id'];
}

/**
 * Check if post exists by title
 */
function versana_companion_post_exists( $title, $post_type = 'post' ) {
    global $wpdb;
    
    $result = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT ID FROM $wpdb->posts 
            WHERE post_title = %s 
            AND post_type = %s 
            AND post_status != 'trash'",
            $title,
            $post_type
        )
    );
    
    return ! empty( $result );
}

/**
 * Create navigation menu for demo
 */
function versana_companion_create_demo_menu( $page_ids, $demo_key ) {
    $menu_name = 'Main Menu';
    $menu_id = wp_create_nav_menu( $menu_name );
    
    if ( is_wp_error( $menu_id ) ) {
        return false;
    }
    
    $home_page_id = get_option( 'page_on_front' );
    $menu_order = 1;
    
    // Define menu structure
    $menu_pages = array( 'Home', 'Services', 'About', 'Contact' );
    
    foreach ( $page_ids as $page_id ) {
        if ( $page_id == $home_page_id ) {
            continue;
        }
        
        $page = get_post( $page_id );
        if ( $page && in_array( $page->post_title, $menu_pages ) ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-object-id' => $page_id,
                'menu-item-object'    => 'page',
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-position'  => $menu_order++,
            ) );
        }
    }
    
    // Add Blog link
    $blog_page = get_option( 'page_for_posts' );
    if ( $blog_page ) {
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-object-id' => $blog_page,
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => $menu_order++,
        ) );
    }
    
    // Assign to primary location
    $locations = get_theme_mod( 'nav_menu_locations', array() );
    $locations['primary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
    
    return $menu_id;
}

/**
 * Set homepage and blog page
 */
function versana_companion_set_reading_settings( $page_ids, $demo_key, $front_page_id = null ) {
    if ( empty( $page_ids ) ) {
        return false;
    }
    
    // For blog demo, show posts on front
    if ( $demo_key === 'blog' ) {
        update_option( 'show_on_front', 'posts' );
        delete_option( 'page_on_front' );
        delete_option( 'page_for_posts' );
        return true;
    }
    
    // For portfolio and business, use custom home pages
    if ( $front_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
    } else {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_ids[0] );
    }
    
    // Create Blog page
    $blog_page_id = versana_companion_create_blog_page();
    if ( $blog_page_id ) {
        update_option( 'page_for_posts', $blog_page_id );
    }
    
    return true;
}

/**
 * Create blog page
 */
function versana_companion_create_blog_page() {
    // Check by slug instead of title
    $existing_page = get_page_by_path( 'blog' );
    if ( $existing_page ) {
        return $existing_page->ID;
    }
    $page_id = wp_insert_post( array(
        'post_title'   => 'Blog',
        'post_content' => '',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_name'    => 'blog',
    ), true );
    if ( is_wp_error( $page_id ) ) {
        return false;
    }
    // Set as Posts Page
    update_option( 'show_on_front', 'page' );
    update_option( 'page_for_posts', $page_id );
    return $page_id;
}

/**
 * Set block theme style variation properly
 */
function versana_set_style_variation( $variation ) {

    $theme = wp_get_theme();
    if ( ! $theme->exists() ) {
        return false;
    }

    // Get available style variations
    $variations = WP_Theme_JSON_Resolver::get_style_variations();

    if ( empty( $variations ) || ! isset( $variations[ $variation ] ) ) {
        return false;
    }

    /**
     * Get current theme mods
     */
    $theme_mods = get_option( 'theme_mods_' . get_stylesheet(), array() );

    // Set style variation
    $theme_mods['wp_theme_style'] = $variation;

    // Update theme mods properly
    update_option( 'theme_mods_' . get_stylesheet(), $theme_mods );

    return true;
}

/**
 * Apply demo theme configuration
 */
function versana_companion_apply_demo_config( $demo_key ) {
    $demos = versana_companion_get_available_demos();
    if ( ! isset( $demos[ $demo_key ] ) ) {
        return false;
    }
    $demo = $demos[ $demo_key ];
    // Apply style variation
    versana_set_style_variation( $demo_key );
    WP_Theme_JSON_Resolver::clean_cached_data();
    // Store active demo
    update_option( 'versana_active_demo', $demo_key );
    return true;
}

/**
 * Get demo page content configurations
 */
function versana_companion_get_demo_page_configs() {
    return array(
        'blog' => array(
            'home' => '<!-- wp:pattern {"slug":"versana/blog-hero"} /-->
                    <!-- wp:pattern {"slug":"versana/latest-articles"} /-->
                    <!-- wp:pattern {"slug":"versana/why-choose-us"} /-->
                    <!-- wp:pattern {"slug":"versana/call-to-action"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/our-services"} /-->',
            'about' => '<!-- wp:pattern {"slug":"versana/about"} /-->',
            'contact' => '<!-- wp:pattern {"slug":"versana/contact"} /-->',
        ),
        'business' => array(
            'home' => '<!-- wp:pattern {"slug":"versana/hero-banner"} /-->
                    <!-- wp:pattern {"slug":"versana/our-services"} /-->
                    <!-- wp:pattern {"slug":"versana/latest-articles"} /-->
                    <!-- wp:pattern {"slug":"versana/call-to-action"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/business-services"} /-->',
            'about' => '<!-- wp:pattern {"slug":"versana/business-about"} /-->',
            'contact' => '<!-- wp:pattern {"slug":"versana/contact"} /-->',
        ),
        'portfolio' => array(
            'home' => '<!-- wp:pattern {"slug":"versana/portfolio-hero"} /-->
                    <!-- wp:pattern {"slug":"versana/latest-articles"} /-->
                    <!-- wp:pattern {"slug":"versana/why-choose-us"} /-->
                    <!-- wp:pattern {"slug":"versana/call-to-action"} /-->',
            'services' => '<!-- wp:pattern {"slug":"versana/our-services"} /-->',
            'about' => '<!-- wp:pattern {"slug":"versana/portfolio-about"} /-->',
            'contact' => '<!-- wp:pattern {"slug":"versana/contact"} /-->',
        ),
    );
}

/**
 * Save import data
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

/**
 * Get imported demo data
 */
function versana_companion_get_import_data() {
    return get_option( 'versana_imported_demo_data', false );
}

/**
 * Get single demo
 */
function versana_companion_get_demo( $demo_key ) {
    $demos = versana_companion_get_available_demos();
    return isset( $demos[ $demo_key ] ) ? $demos[ $demo_key ] : null;
}

/**
 * AJAX: Import demo
 */
function versana_companion_ajax_import_demo() {
    check_ajax_referer( 'versana_companion_ajax', 'nonce' );
    
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => 'Insufficient permissions' ) );
    }
    
    $demo_key = isset( $_POST['demo_key'] ) ? sanitize_key( $_POST['demo_key'] ) : '';
    
    if ( empty( $demo_key ) ) {
        wp_send_json_error( array( 'message' => 'Invalid demo selected' ) );
    }

    if ( get_option( 'versana_active_demo' ) === $demo_key ) {
        wp_send_json_success( array( 
            'message' => 'Demo is already active',
            'demo_key' => $demo_key 
        ) );
    }
    
    $demo = versana_companion_get_demo( $demo_key );
    
    if ( ! $demo || ! file_exists( $demo['xml_file'] ) ) {
        wp_send_json_error( array( 'message' => 'Demo file not found' ) );
    }
    
    $xml_content = file_get_contents( $demo['xml_file'] );
    
    if ( $xml_content === false ) {
        wp_send_json_error( array( 'message' => 'Could not read demo file' ) );
    }
    
    $parsed_data = versana_companion_parse_demo_xml( $xml_content, $demo_key );
    
    if ( $parsed_data === false ) {
        wp_send_json_error( array( 'message' => 'Could not parse XML file' ) );
    }
    
    $import_results = versana_companion_import_content( $parsed_data, $demo_key );
    
    if ( ! $import_results['success'] ) {
        wp_send_json_error( array( 'message' => 'Import completed with errors' ) );
    }
    
    // Create menu
    if ( ! empty( $import_results['pages'] ) ) {
        $menu_id = versana_companion_create_demo_menu( $import_results['pages'], $demo_key );
        $import_results['menu_id'] = $menu_id;
    }
    
    // Set reading settings
    $front_page_id = isset( $import_results['front_page_id'] ) ? $import_results['front_page_id'] : null;
    versana_companion_set_reading_settings( $import_results['pages'], $demo_key, $front_page_id );
    
    $blog_page = get_page_by_path( 'blog' );
    if ( $blog_page ) {
        $import_results['blog_page_id'] = $blog_page->ID;
    }
    
    // Apply demo config
    versana_companion_apply_demo_config( $demo_key );
    
    // Save import data
    versana_companion_save_import_data( $demo_key, $import_results );
    
    $message = sprintf(
        'Demo imported successfully! Created %d posts, %d pages, and navigation menu.',
        count( $import_results['posts'] ),
        count( $import_results['pages'] )
    );
    
    if ( ! empty( $import_results['skipped'] ) ) {
        $message .= sprintf( ' Skipped %d existing items.', count( $import_results['skipped'] ) );
    }
    
    wp_send_json_success( array( 
        'message' => $message,
        'demo_key' => $demo_key 
    ) );
}
add_action( 'wp_ajax_versana_import_demo', 'versana_companion_ajax_import_demo' );

/**
 * AJAX: Remove demo
 */
function versana_companion_ajax_remove_demo() {
    check_ajax_referer( 'versana_companion_ajax', 'nonce' );
    
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => 'Insufficient permissions' ) );
    }
    
    $import_data = versana_companion_get_import_data();
    
    if ( ! $import_data ) {
        wp_send_json_error( array( 'message' => 'No imported demo found' ) );
    }
    
    $deleted_counts = array(
        'posts'      => 0,
        'pages'      => 0,
        'categories' => 0,
        'tags'       => 0,
    );
    
    // Delete posts
    foreach ( $import_data['posts'] as $post_id ) {
        if ( wp_delete_post( $post_id, true ) ) {
            $deleted_counts['posts']++;
        }
    }
    
    // Delete pages
    foreach ( $import_data['pages'] as $page_id ) {
        if ( wp_delete_post( $page_id, true ) ) {
            $deleted_counts['pages']++;
        }
    }
    
    // Delete blog page
    if ( ! empty( $import_data['blog_page_id'] ) ) {
        wp_delete_post( $import_data['blog_page_id'], true );
    }
    
    // Delete categories
    foreach ( $import_data['categories'] as $cat_id ) {
        if ( get_term( $cat_id, 'category' ) ) {
            wp_delete_term( $cat_id, 'category' );
            $deleted_counts['categories']++;
        }
    }
    
    // Delete tags
    foreach ( $import_data['tags'] as $tag_id ) {
        if ( get_term( $tag_id, 'post_tag' ) ) {
            wp_delete_term( $tag_id, 'post_tag' );
            $deleted_counts['tags']++;
        }
    }
    
    // Delete menu
    if ( ! empty( $import_data['menu_id'] ) ) {
        wp_delete_nav_menu( $import_data['menu_id'] );
    }
    
    // Reset reading settings
    update_option( 'show_on_front', 'posts' );
    delete_option( 'page_on_front' );
    delete_option( 'page_for_posts' );
    
    remove_theme_mod( 'wp_theme_style' );
    delete_option( 'versana_active_demo' );

    // Delete import data
    delete_option( 'versana_imported_demo_data' );
    
    $message = sprintf(
        'Demo removed! Deleted %d posts, %d pages, %d categories, and %d tags.',
        $deleted_counts['posts'],
        $deleted_counts['pages'],
        $deleted_counts['categories'],
        $deleted_counts['tags']
    );
    
    wp_send_json_success( array( 'message' => $message ) );
}
add_action( 'wp_ajax_versana_remove_demo', 'versana_companion_ajax_remove_demo' );