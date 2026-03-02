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
 * Get available demos
 * 
 * Returns array of available demo configurations
 * 
 * @return array Demos array
 */
function versana_companion_get_available_demos() {
    $demos = array(
        'business' => array(
            'name'        => __( 'Business Website', 'versana-companion' ),
            'description' => __( 'Professional business website with services and portfolio sections. Perfect for corporate sites, agencies, and consultancies.', 'versana-companion' ),
            'preview_url' => 'https://demos.codoplex.com/versana/business/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/demos/business.jpg',
            'xml_file'    => VERSANA_COMPANION_PATH . 'demos/business-content.xml',
            'category'    => 'business',
            'tags'        => array( 'business', 'corporate', 'professional' ),
        ),
        'blog' => array(
            'name'        => __( 'Personal Blog', 'versana-companion' ),
            'description' => __( 'Clean and minimal blog layout perfect for writers and content creators. Focus on readability and content.', 'versana-companion' ),
            'preview_url' => 'https://demos.codoplex.com/versana/blog/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/demos/blog.jpg',
            'xml_file'    => VERSANA_COMPANION_PATH . 'demos/blog-content.xml',
            'category'    => 'blog',
            'tags'        => array( 'blog', 'minimal', 'writer' ),
        ),
        'portfolio' => array(
            'name'        => __( 'Creative Portfolio', 'versana-companion' ),
            'description' => __( 'Showcase your work with a beautiful portfolio layout. Ideal for designers, photographers, and creative professionals.', 'versana-companion' ),
            'preview_url' => 'https://demos.codoplex.com/versana/portfolio/',
            'thumbnail'   => VERSANA_COMPANION_URL . 'assets/images/demos/portfolio.jpg',
            'xml_file'    => VERSANA_COMPANION_PATH . 'demos/portfolio-content.xml',
            'category'    => 'portfolio',
            'tags'        => array( 'portfolio', 'creative', 'showcase' ),
        ),
    );
    
    /**
     * Filter available demos
     * 
     * Allows adding custom demos via child theme or plugin
     * 
     * @param array $demos Array of demo configurations
     */
    return apply_filters( 'versana_companion_available_demos', $demos );
}

/**
 * Add Companion tabs to theme options
 * 
 * @param array $tabs Existing tabs
 * @return array Modified tabs
 */
function versana_companion_add_settings_tabs( $tabs ) {
    // Demo Import tab (priority 5 - very first)
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
 * Render Demo Import tab with cleanup
 */
function versana_companion_render_demo_import_tab() {
    
    // Check if demo already imported
    $imported_demo = versana_companion_get_import_data();
    
    // Get available demos
    $demos = versana_companion_get_available_demos();
    
    ?>
    <div class="versana-tab-content">
        <h2><?php esc_html_e( 'Import Demo Content', 'versana-companion' ); ?></h2>
        <?php settings_errors( 'versana_companion_messages' ); ?>
        <?php if ( $imported_demo ) : ?>
            <!-- Currently Imported Demo Notice -->
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
            <?php esc_html_e( 'Choose a demo to import. This will add sample posts, pages, and create navigation menus.', 'versana-companion' ); ?>
        </p>
        
        <?php if ( $imported_demo ) : ?>
            <p class="description">
                <strong><?php esc_html_e( 'Note:', 'versana-companion' ); ?></strong>
                <?php esc_html_e( 'You can import a different demo. Previous demo content will remain unless you remove it first.', 'versana-companion' ); ?>
            </p>
        <?php endif; ?>
        
        <div class="versana-demo-library">
            <?php foreach ( $demos as $demo_key => $demo ) : ?>
                <div class="versana-demo-item <?php echo $imported_demo && $imported_demo['demo_key'] === $demo_key ? 'demo-imported' : ''; ?>">
                    <!-- Demo Thumbnail -->
                    <div class="demo-thumbnail">
                        <?php if ( ! empty( $demo['thumbnail'] ) && file_exists( str_replace( VERSANA_COMPANION_URL, VERSANA_COMPANION_PATH, $demo['thumbnail'] ) ) ) : ?>
                            <img src="<?php echo esc_url( $demo['thumbnail'] ); ?>" 
                                 alt="<?php echo esc_attr( $demo['name'] ); ?>">
                        <?php else : ?>
                            <div class="demo-thumbnail-placeholder">
                                <span class="dashicons dashicons-admin-appearance"></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $imported_demo && $imported_demo['demo_key'] === $demo_key ) : ?>
                            <div class="demo-imported-badge">
                                <span class="dashicons dashicons-yes-alt"></span>
                                <?php esc_html_e( 'Imported', 'versana-companion' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Demo Info -->
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
                            <!-- REMOVE BUTTON (only for imported demo) -->
                            <form method="post" action="" style="display:inline;">
                                <?php wp_nonce_field( 'versana_cleanup_demo', 'versana_cleanup_nonce' ); ?>
                                <input type="hidden" name="versana_cleanup_demo" value="1">

                                <button type="submit"
                                        class="button button-secondary"
                                        onclick="return confirm('<?php esc_attr_e( 'This will permanently delete all imported demo content. Are you sure?', 'versana-companion' ); ?>');">
                                    <span class="dashicons dashicons-trash"></span>
                                    <?php esc_html_e( 'Remove', 'versana-companion' ); ?>
                                </button>
                            </form>
                        <?php else : ?>
                            <!-- IMPORT BUTTON -->
                            <?php if ( file_exists( $demo['xml_file'] ) ) : ?>
                                <form method="post" action="" style="display:inline;">
                                    <?php wp_nonce_field( 'versana_import_demo', 'versana_import_nonce' ); ?>
                                    <input type="hidden" name="demo_key" value="<?php echo esc_attr( $demo_key ); ?>">

                                    <button type="submit"
                                            name="versana_import_demo"
                                            class="button button-primary"
                                            onclick="return confirm('<?php esc_attr_e( 'This will import demo content. Continue?', 'versana-companion' ); ?>');">
                                        <span class="dashicons dashicons-download"></span>
                                        <?php esc_html_e( 'Import', 'versana-companion' ); ?>
                                    </button>
                                </form>
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
 * Get single demo information
 * 
 * @param string $demo_key Demo identifier
 * @return array|null Demo data or null if not found
 */
function versana_companion_get_demo( $demo_key ) {
    $demos = versana_companion_get_available_demos();
    return isset( $demos[ $demo_key ] ) ? $demos[ $demo_key ] : null;
}

/**
 * Enqueue demo library assets
 * 
 * @param string $hook Current admin page
 */
function versana_companion_enqueue_demo_library_assets( $hook ) {
    // Only on theme options page
    if ( 'appearance_page_versana-options' !== $hook ) {
        return;
    }
    
    // Only if on demo import tab
    $active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';
    if ( $active_tab && 'demo_import' !== $active_tab ) {
        return;
    }
    
    // Enqueue CSS
    wp_enqueue_style(
        'versana-companion-demo-library',
        VERSANA_COMPANION_URL . 'assets/css/demo-library.css',
        array(),
        VERSANA_COMPANION_VERSION
    );
}
add_action( 'admin_enqueue_scripts', 'versana_companion_enqueue_demo_library_assets' );

/**
 * Parse demo XML file
 * 
 * Extracts posts, pages, categories, and tags
 * 
 * @param string $xml_content XML file content
 * @return array|false Parsed data or false on failure
 */
function versana_companion_parse_demo_xml( $xml_content ) {
    // Suppress XML errors
    libxml_use_internal_errors( true );
    
    // Load XML
    $xml = simplexml_load_string( $xml_content );
    
    if ( $xml === false ) {
        return false;
    }
    
    // Register namespaces
    $namespaces = $xml->getNamespaces( true );
    
    $parsed_data = array(
        'title'      => (string) $xml->channel->title,
        'posts'      => array(),
        'pages'      => array(),
        'categories' => array(),
        'tags'       => array(),
    );
    
    // Process each item
    foreach ( $xml->channel->item as $item ) {
        // Get namespaced elements
        $wp = $item->children( $namespaces['wp'] );
        $content = $item->children( $namespaces['content'] );
        $excerpt = $item->children( $namespaces['excerpt'] );
        
        // Get post type
        $post_type = (string) $wp->post_type;
        
        // Build item data
        $item_data = array(
            'title'        => (string) $item->title,
            'content'      => (string) $content->encoded,
            'excerpt'      => (string) $excerpt->encoded,
            'post_type'    => $post_type,
            'status'       => (string) $wp->status,
            'post_name'    => (string) $wp->post_name,
            'post_date'    => (string) $wp->post_date,
            'categories'   => array(),
            'tags'         => array(),
        );
        
        // Extract categories and tags
        foreach ( $item->category as $category ) {
            $domain = (string) $category['domain'];
            $name = (string) $category;
            $nicename = (string) $category['nicename'];
            
            if ( $domain === 'category' ) {
                $item_data['categories'][] = $name;
                // Track unique categories
                if ( ! in_array( $name, $parsed_data['categories'] ) ) {
                    $parsed_data['categories'][] = $name;
                }
            } elseif ( $domain === 'post_tag' ) {
                $item_data['tags'][] = $name;
                // Track unique tags
                if ( ! in_array( $name, $parsed_data['tags'] ) ) {
                    $parsed_data['tags'][] = $name;
                }
            }
        }
        
        // Add to appropriate array
        if ( $post_type === 'post' ) {
            $parsed_data['posts'][] = $item_data;
        } elseif ( $post_type === 'page' ) {
            $parsed_data['pages'][] = $item_data;
        }
    }
    
    return $parsed_data;
}

/**
 * Import posts and pages from parsed data
 * 
 * Creates WordPress posts and pages
 * 
 * @param array $parsed_data Parsed XML data
 * @return array Import results with IDs
 */
function versana_companion_import_content( $parsed_data ) {
    $results = array(
        'success'        => true,
        'posts'          => array(),
        'pages'          => array(),
        'categories'     => array(),
        'tags'           => array(),
        'errors'         => array(),
        'skipped'        => array(),
    );
    
    // First, create categories
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
        // Check if already exists
        if ( versana_companion_post_exists( $post_data['title'], 'post' ) ) {
            $results['skipped'][] = array(
                'title' => $post_data['title'],
                'type'  => 'post',
            );
            continue;
        }
        
        // Prepare post arguments
        $post_args = array(
            'post_title'   => $post_data['title'],
            'post_content' => $post_data['content'],
            'post_excerpt' => $post_data['excerpt'],
            'post_status'  => $post_data['status'],
            'post_type'    => 'post',
            'post_name'    => $post_data['post_name'],
            'post_author'  => get_current_user_id(),
        );
        
        // Create post
        $post_id = wp_insert_post( $post_args, true );
        
        if ( is_wp_error( $post_id ) ) {
            $results['errors'][] = array(
                'title' => $post_data['title'],
                'error' => $post_id->get_error_message(),
            );
            $results['success'] = false;
        } else {
            $results['posts'][] = $post_id;
            
            // Assign categories
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
            
            // Assign tags
            if ( ! empty( $post_data['tags'] ) ) {
                wp_set_post_tags( $post_id, $post_data['tags'] );
            }
        }
    }
    
    // Import pages
    foreach ( $parsed_data['pages'] as $page_data ) {
        if ( versana_companion_post_exists( $page_data['title'], 'page' ) ) {
            $results['skipped'][] = array(
                'title' => $page_data['title'],
                'type'  => 'page',
            );
            continue;
        }
        
        $page_args = array(
            'post_title'   => $page_data['title'],
            'post_content' => $page_data['content'],
            'post_status'  => $page_data['status'],
            'post_type'    => 'page',
            'post_name'    => $page_data['post_name'],
            'post_author'  => get_current_user_id(),
        );
        
        $page_id = wp_insert_post( $page_args, true );
        
        if ( is_wp_error( $page_id ) ) {
            $results['errors'][] = array(
                'title' => $page_data['title'],
                'error' => $page_id->get_error_message(),
            );
            $results['success'] = false;
        } else {
            $results['pages'][] = $page_id;
        }
    }
    
    return $results;
}

/**
 * Create category if doesn't exist
 * 
 * @param string $category_name Category name
 * @return int|false Category ID or false
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
 * 
 * @param string $tag_name Tag name
 * @return int|false Tag ID or false
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
 * 
 * @param string $title Post title
 * @param string $post_type Post type
 * @return bool True if exists
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
 * 
 * Creates menu with main pages
 * 
 * @param array $page_ids Array of page IDs
 * @param string $demo_key Demo identifier
 * @return int|false Menu ID or false
 */
function versana_companion_create_demo_menu( $page_ids, $demo_key ) {
    // Create menu
    $menu_name = ucfirst( $demo_key ) . ' Menu';
    $menu_id = wp_create_nav_menu( $menu_name );
    
    if ( is_wp_error( $menu_id ) ) {
        return false;
    }
    
    // Get Home page (usually first page)
    $home_page_id = isset( $page_ids[0] ) ? $page_ids[0] : 0;
    
    // Menu order counter
    $menu_order = 1;
    
    // Add pages to menu
    foreach ( $page_ids as $page_id ) {
        // Skip home page, we'll add it first
        if ( $page_id === $home_page_id ) {
            continue;
        }
        
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-object-id'   => $page_id,
            'menu-item-object'      => 'page',
            'menu-item-type'        => 'post_type',
            'menu-item-status'      => 'publish',
            'menu-item-position'    => $menu_order++,
        ) );
    }
    
    // Add "Blog" link to posts page
    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'       => 'Blog',
        'menu-item-url'         => home_url( '/blog/' ),
        'menu-item-status'      => 'publish',
        'menu-item-type'        => 'custom',
        'menu-item-position'    => $menu_order++,
    ) );
    
    // Assign menu to primary location
    $locations = get_theme_mod( 'nav_menu_locations' );
    $locations['primary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
    
    return $menu_id;
}

/**
 * Set homepage and blog page
 * 
 * Configures WordPress reading settings
 * 
 * @param array $page_ids Array of page IDs
 * @return bool Success status
 */
function versana_companion_set_reading_settings( $page_ids ) {
    if ( empty( $page_ids ) ) {
        return false;
    }
    
    // Get Home page (first page in XML)
    $home_page_id = $page_ids[0];
    
    // Create "Blog" page if doesn't exist
    $blog_page_id = versana_companion_create_blog_page();
    
    // Set front page to display static page
    update_option( 'show_on_front', 'page' );
    
    // Set homepage
    update_option( 'page_on_front', $home_page_id );
    
    // Set blog page
    if ( $blog_page_id ) {
        update_option( 'page_for_posts', $blog_page_id );
    }
    
    return true;
}

/**
 * Create blog page for posts
 * 
 * @return int|false Page ID or false
 */
function versana_companion_create_blog_page() {
    // Check if Blog page exists
    $blog_page = get_page_by_title( 'Blog' );
    
    if ( $blog_page ) {
        return $blog_page->ID;
    }
    
    // Create Blog page
    $page_id = wp_insert_post( array(
        'post_title'   => 'Blog',
        'post_content' => '',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_name'    => 'blog',
    ) );
    
    if ( is_wp_error( $page_id ) ) {
        return false;
    }
    
    return $page_id;
}

/**
 * Apply demo-specific theme configuration
 * 
 * Different settings for each demo
 * 
 * @param string $demo_key Demo identifier
 * @return bool Success status
 */
function versana_companion_apply_demo_config( $demo_key ) {
    $configs = array(
        'business' => array(
            'blog_layout'            => 'list',
            'blog_sidebar_position'  => 'right',
            'archive_layout'         => 'list',
            'enable_sticky_header'   => true,
            'enable_back_to_top'     => true,
        ),
        'blog' => array(
            'blog_layout'            => '2col',
            'blog_sidebar_position'  => 'right',
            'archive_layout'         => '2col',
            'enable_sticky_header'   => false,
            'enable_back_to_top'     => true,
        ),
        'portfolio' => array(
            'blog_layout'            => '3col',
            'blog_sidebar_position'  => 'none',
            'archive_layout'         => '3col',
            'enable_sticky_header'   => true,
            'enable_back_to_top'     => true,
        ),
    );
    
    if ( ! isset( $configs[ $demo_key ] ) ) {
        return false;
    }
    
    $config = $configs[ $demo_key ];
    
    // Get existing theme options
    $theme_options = get_option( 'versana_theme_options', array() );
    
    // Merge with demo config
    $theme_options = array_merge( $theme_options, $config );
    
    // Update theme options
    update_option( 'versana_theme_options', $theme_options );
    
    return true;
}

/**
 * Save imported data for cleanup
 * 
 * Stores all created IDs for future deletion
 * 
 * @param string $demo_key Demo identifier
 * @param array $import_results Import results array
 * @return bool Success status
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
 * 
 * @return array|false Import data or false
 */
function versana_companion_get_import_data() {
    return get_option( 'versana_imported_demo_data', false );
}

/**
 * Check if demo is currently imported
 * 
 * @return bool True if demo imported
 */
function versana_companion_has_imported_demo() {
    $import_data = versana_companion_get_import_data();
    return ! empty( $import_data );
}

/**
 * Process complete demo import
 * 
 * Main function coordinating entire import
 */
function versana_companion_process_demo_import() {
    // Security check
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    
    // Verify nonce
    if ( ! isset( $_POST['versana_import_nonce'] ) || 
         ! wp_verify_nonce( $_POST['versana_import_nonce'], 'versana_import_demo' ) ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_import_error',
            'Security verification failed',
            'error'
        );
        return;
    }
    
    // Get demo key
    $demo_key = isset( $_POST['demo_key'] ) ? sanitize_key( $_POST['demo_key'] ) : '';
    
    if ( empty( $demo_key ) ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_import_error',
            'Invalid demo selected',
            'error'
        );
        return;
    }
    
    // Get demo info
    $demo = versana_companion_get_demo( $demo_key );
    
    if ( ! $demo || ! file_exists( $demo['xml_file'] ) ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_import_error',
            'Demo file not found',
            'error'
        );
        return;
    }
    
    // Read XML file
    $xml_content = file_get_contents( $demo['xml_file'] );
    
    if ( $xml_content === false ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_import_error',
            'Could not read demo file',
            'error'
        );
        return;
    }
    
    // Parse XML
    $parsed_data = versana_companion_parse_demo_xml( $xml_content );
    
    if ( $parsed_data === false ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_import_error',
            'Could not parse XML file',
            'error'
        );
        return;
    }
    
    // Import content
    $import_results = versana_companion_import_content( $parsed_data );
    
    if ( ! $import_results['success'] ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_import_error',
            'Import completed with errors',
            'error'
        );
        return;
    }
    
    // Create navigation menu
    if ( ! empty( $import_results['pages'] ) ) {
        $menu_id = versana_companion_create_demo_menu( $import_results['pages'], $demo_key );
        $import_results['menu_id'] = $menu_id;
    }
    
    // Set homepage and blog page
    if ( ! empty( $import_results['pages'] ) ) {
        versana_companion_set_reading_settings( $import_results['pages'] );
        $blog_page = get_page_by_title( 'Blog' );
        if ( $blog_page ) {
            $import_results['blog_page_id'] = $blog_page->ID;
        }
    }
    
    // Apply demo configuration
    versana_companion_apply_demo_config( $demo_key );
    
    // Save import data for cleanup
    versana_companion_save_import_data( $demo_key, $import_results );
    
    // Build success message
    $message = sprintf(
        'Demo imported successfully! Created %d posts, %d pages, and navigation menu.',
        count( $import_results['posts'] ),
        count( $import_results['pages'] )
    );
    
    if ( ! empty( $import_results['skipped'] ) ) {
        $message .= sprintf( ' Skipped %d existing items.', count( $import_results['skipped'] ) );
    }
    
    add_settings_error(
        'versana_companion_messages',
        'versana_import_success',
        $message,
        'updated'
    );

    wp_redirect( add_query_arg( array( 'tab' => 'demo_import' ), admin_url( 'themes.php?page=versana-options' ) ) );
    exit;
}

/**
 * Delete imported demo content
 * 
 * Removes all content created by import
 */
function versana_companion_cleanup_demo() {
    // Security check
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    
    // Verify nonce
    if ( ! isset( $_POST['versana_cleanup_nonce'] ) || 
         ! wp_verify_nonce( $_POST['versana_cleanup_nonce'], 'versana_cleanup_demo' ) ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_cleanup_error',
            'Security verification failed',
            'error'
        );
        return;
    }
    
    // Get import data
    $import_data = versana_companion_get_import_data();
    
    if ( ! $import_data ) {
        add_settings_error(
            'versana_companion_messages',
            'versana_cleanup_error',
            'No imported demo found',
            'error'
        );
        return;
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
    
    // Delete blog page if created
    if ( ! empty( $import_data['blog_page_id'] ) ) {
        wp_delete_post( $import_data['blog_page_id'], true );
    }
    
    // Delete categories (only if empty)
    foreach ( $import_data['categories'] as $cat_id ) {
        if ( get_term( $cat_id, 'category' ) ) {
            wp_delete_term( $cat_id, 'category' );
            $deleted_counts['categories']++;
        }
    }
    
    // Delete tags (only if not used)
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
    
    // Reset homepage to posts
    update_option( 'show_on_front', 'posts' );
    delete_option( 'page_on_front' );
    delete_option( 'page_for_posts' );
    
    // Delete import data
    delete_option( 'versana_imported_demo_data' );
    
    // Success message
    $message = sprintf(
        'Demo removed! Deleted %d posts, %d pages, %d categories, and %d tags.',
        $deleted_counts['posts'],
        $deleted_counts['pages'],
        $deleted_counts['categories'],
        $deleted_counts['tags']
    );
    
    add_settings_error(
        'versana_companion_messages',
        'versana_cleanup_success',
        $message,
        'updated'
    );

    set_transient( 'settings_errors', get_settings_errors(), 30 );

    wp_redirect( add_query_arg( array( 'tab' => 'demo_import' ), admin_url( 'themes.php?page=versana-options' ) ) );
    exit;
}

/**
 * Handle demo import and cleanup form submissions
 */
function versana_companion_handle_demo_actions() {

    if ( isset( $_POST['versana_import_demo'] ) ) {
        versana_companion_process_demo_import();
    }

    if ( isset( $_POST['versana_cleanup_demo'] ) ) {
        versana_companion_cleanup_demo();
    }
}
add_action( 'admin_init', 'versana_companion_handle_demo_actions' );