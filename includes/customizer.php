<?php
/**
 * Versana Theme Customizer
 *
 * @package Versana
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register customizer settings
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function versana_customize_register( $wp_customize ) {
    
    /**
     * ================================================================
     * HEADER SETTINGS SECTION
     * ================================================================
     */
    $wp_customize->add_section( 'versana_header_settings', array(
        'title'    => __( 'Header Settings', 'versana' ),
        'priority' => 30,
    ) );
    
    // Header Layout
    $wp_customize->add_setting( 'header_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'versana_sanitize_select',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( 'header_layout', array(
        'label'   => __( 'Header Layout', 'versana' ),
        'section' => 'versana_header_settings',
        'type'    => 'select',
        'choices' => array(
            'default'  => __( 'Default (Logo Left, Menu Right)', 'versana' ),
            'centered' => __( 'Centered (Logo & Menu Centered)', 'versana' ),
        ),
    ) );
    
    // Sticky Header
    $wp_customize->add_setting( 'enable_sticky_header', array(
        'default'           => false,
        'sanitize_callback' => 'versana_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( 'enable_sticky_header', array(
        'label'       => __( 'Enable Sticky Header', 'versana' ),
        'description' => __( 'Make header stick to top on scroll', 'versana' ),
        'section'     => 'versana_header_settings',
        'type'        => 'checkbox',
    ) );
    
    /**
     * ================================================================
     * FOOTER SETTINGS SECTION
     * ================================================================
     */
    $wp_customize->add_section( 'versana_footer_settings', array(
        'title'    => __( 'Footer Settings', 'versana' ),
        'priority' => 40,
    ) );
    
    // Enable Back to Top
    $wp_customize->add_setting( 'enable_back_to_top', array(
        'default'           => true,
        'sanitize_callback' => 'versana_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( 'enable_back_to_top', array(
        'label'       => __( 'Enable Back to Top Button', 'versana' ),
        'description' => __( 'Show a button to scroll back to top', 'versana' ),
        'section'     => 'versana_footer_settings',
        'type'        => 'checkbox',
    ) );
    
    /**
     * ================================================================
     * BLOG SETTINGS SECTION
     * ================================================================
     */
    $wp_customize->add_section( 'versana_blog_settings', array(
        'title'    => __( 'Blog Settings', 'versana' ),
        'priority' => 50,
    ) );
    
    // Blog Layout
    $wp_customize->add_setting( 'blog_layout', array(
        'default'           => 'list',
        'sanitize_callback' => 'versana_sanitize_select',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( 'blog_layout', array(
        'label'   => __( 'Blog Layout Style', 'versana' ),
        'section' => 'versana_blog_settings',
        'type'    => 'select',
        'choices' => array(
            'list' => __( 'List View', 'versana' ),
            '2col' => __( '2 Columns Grid', 'versana' ),
            '3col' => __( '3 Columns Grid', 'versana' ),
        ),
    ) );
    
    // Blog Sidebar Position
    $wp_customize->add_setting( 'blog_sidebar_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'versana_sanitize_select',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( 'blog_sidebar_position', array(
        'label'   => __( 'Blog Sidebar Position', 'versana' ),
        'section' => 'versana_blog_settings',
        'type'    => 'select',
        'choices' => array(
            'right' => __( 'Right Sidebar', 'versana' ),
            'left'  => __( 'Left Sidebar', 'versana' ),
            'none'  => __( 'No Sidebar (Full Width)', 'versana' ),
        ),
    ) );
    
    // Archive Layout
    $wp_customize->add_setting( 'archive_layout', array(
        'default'           => 'list',
        'sanitize_callback' => 'versana_sanitize_select',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( 'archive_layout', array(
        'label'   => __( 'Archive Layout Style', 'versana' ),
        'section' => 'versana_blog_settings',
        'type'    => 'select',
        'choices' => array(
            'list' => __( 'List View', 'versana' ),
            '2col' => __( '2 Columns Grid', 'versana' ),
            '3col' => __( '3 Columns Grid', 'versana' ),
        ),
    ) );
    
}
add_action( 'customize_register', 'versana_customize_register' );

/**
 * Sanitize select fields
 *
 * @param string $input   The input to sanitize.
 * @param object $setting The setting object.
 * @return string Sanitized input.
 */
function versana_sanitize_select( $input, $setting ) {
    $input   = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize checkbox
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function versana_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Get customizer option value
 *
 * @param string $option  Option name.
 * @param mixed  $default Default value.
 * @return mixed Option value.
 */
function versana_get_theme_mod( $option, $default = false ) {
    return get_theme_mod( $option, $default );
}

/**
 * Add dynamic body classes based on customizer settings
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function versana_customize_body_classes( $classes ) {

    // Sticky Header
    if ( versana_get_theme_mod( 'enable_sticky_header', false ) ) {
        $classes[] = 'has-sticky-header';
    }

    // Header Layout
    $header_layout = versana_get_theme_mod( 'header_layout', 'default' );
    $classes[] = 'header-layout-' . sanitize_html_class( $header_layout );

    // Blog/Archive Pages: Sidebar position
    if ( is_home() || is_archive() || is_search() || is_singular() ) {
        $sidebar_position = versana_get_theme_mod( 'blog_sidebar_position', 'right' );
        $valid_positions  = array( 'left', 'right', 'none' );

        // Remove previous sidebar-related classes if they exist
        $classes = array_filter( $classes, function( $class ) {
            return ! in_array( $class, array( 'has-sidebar', 'sidebar-left', 'sidebar-right' ), true );
        } );

        // Only add sidebar classes if sidebar is not 'none'
        if ( in_array( $sidebar_position, array( 'left', 'right' ), true ) ) {
            $classes[] = 'has-sidebar';
            $classes[] = 'sidebar-' . sanitize_html_class( $sidebar_position );
        }

        if ( in_array( $sidebar_position, array( 'none' ), true ) ) {
            $classes[] = 'sidebar-none';
        }
    }

    // Blog Layout (on blog/home page)
    if ( is_home() ) {
        $blog_layout = versana_get_theme_mod( 'blog_layout', 'list' );
        $valid_blog_layouts = array( 'list', '2col', '3col' );
        if ( in_array( $blog_layout, $valid_blog_layouts, true ) ) {
            $classes[] = 'blog-layout-' . sanitize_html_class( $blog_layout );
        } else {
            $classes[] = 'blog-layout-list';
        }
    }

    // Archive Layout (archive/search pages)
    if ( is_archive() || is_search() ) {
        $archive_layout = versana_get_theme_mod( 'archive_layout', 'list' );
        if ( $archive_layout !== 'inherit' ) {
            $classes[] = 'archive-layout-' . sanitize_html_class( $archive_layout );
        }
    }

    return $classes;
}
// Remove parent theme body_class filter
add_action( 'after_setup_theme', function() {
    remove_filter( 'body_class', 'versana_body_classes', 10 );
    add_filter( 'body_class', 'versana_customize_body_classes', 10 );
});

/**
 * Enqueue dynamic header and theme assets
 * Loads CSS/JS only when features are enabled
 */
function versana_enqueue_customizer_dynamic_assets() {

    // Check Customizer settings
    $sticky_enabled = versana_get_theme_mod( 'enable_sticky_header', false );
    $header_layout  = versana_get_theme_mod( 'header_layout', 'default' );

    // Load header CSS if non-default layout is active
    if ( $header_layout !== 'default' ) {
        wp_enqueue_style(
            'versana-header-layouts',
            VERSANA_COMPANION_URL . '/assets/css/header-layouts.css',
            array(),
            VERSANA_COMPANION_VERSION
        );
    }

    // Load assets if sticky header is enabled
    if ( $sticky_enabled ) {
        wp_enqueue_style(
            'versana-sticky-header',
            VERSANA_COMPANION_URL . '/assets/css/sticky-header.css',
            array(),
            VERSANA_COMPANION_VERSION
        );
        wp_enqueue_script(
            'versana-sticky-header',
            VERSANA_COMPANION_URL . '/assets/js/sticky-header.js',
            array(),
            VERSANA_COMPANION_VERSION,
            true
        );
    }

    /**
     * Blog-specific assets
     * Load on: blog index, archives, search, single posts
     */
    if ( is_home() || is_archive() || is_search() || is_singular() ) {
        wp_enqueue_style(
            'versana-blog-layouts',
            VERSANA_COMPANION_URL . '/assets/css/blog-layouts.css',
            array(),
            VERSANA_COMPANION_VERSION
        );
    }

    // Patterns CSS (always load)
    wp_enqueue_style(
        'versana-patterns-styles',
        VERSANA_COMPANION_URL . '/assets/css/pattern-styles.css',
        array(),
        VERSANA_COMPANION_VERSION
    );

    // Footer JS - only if back-to-top is enabled in Customizer
    if ( versana_get_theme_mod( 'enable_back_to_top', true ) ) {
        wp_enqueue_style(
            'back-to-top',
            VERSANA_COMPANION_URL . '/assets/css/back-to-top.css',
            array(),
            VERSANA_COMPANION_VERSION
        );
        wp_enqueue_script(
            'versana-back-to-top',
            VERSANA_COMPANION_URL . '/assets/js/back-to-top.js',
            array(),
            VERSANA_COMPANION_VERSION,
            true
        );
    }

}
add_action( 'wp_enqueue_scripts', 'versana_enqueue_customizer_dynamic_assets' );

/**
 * Render back to top button
 * Only renders if enabled in Customizer
 */
function versana_render_back_to_top() {
    if ( ! versana_get_theme_mod( 'enable_back_to_top', true ) ) {
        return;
    }
    ?>
    <button class="back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'versana' ); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M12 4l-8 8h5v8h6v-8h5z"/>
        </svg>
    </button>
    <?php
}

/**
 * Add back to top button to footer
 * Hooked to wp_footer
 */
function versana_add_back_to_top() {
    versana_render_back_to_top();
}
add_action( 'wp_footer', 'versana_add_back_to_top', 999 );