<?php
/**
 * Versana Companion - Premium Features Implementation
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Premium Feature Bootstrapping
 */
if ( versana_is_premium_feature_enabled( 'premium_advanced_lazy_load' ) ) {
    add_filter( 'wp_get_attachment_image_attributes', 'versana_pro_lazy_add_attributes', 20, 3 );
    add_filter( 'the_content', 'versana_pro_enhance_content_images', 20 );
}

if ( versana_is_premium_feature_enabled( 'premium_breadcrumbs' ) ) {
    add_action( 'versana_before_content', 'versana_pro_add_breadcrumbs_to_content' );
}

if ( versana_is_premium_feature_enabled( 'premium_reading_progress' ) ) {
    add_action( 'wp_body_open', 'versana_pro_reading_progress_markup' );
}

if ( versana_is_premium_feature_enabled( 'premium_related_posts' ) ) {
    add_action( 'versana_after_content', 'versana_pro_related_posts' );
}

// Unified Assets Enqueue
add_action( 'wp_enqueue_scripts', 'versana_pro_enqueue_feature_assets' );

/**
 * Enqueue all premium styles and scripts
 */
function versana_pro_enqueue_feature_assets() {
    wp_enqueue_style( 'versana-style' );

    $custom_css = "";
    $handle = wp_style_is( 'versana-style', 'enqueued' ) ? 'versana-style' : 'wp-block-library';

    // Lazy Load CSS
    if ( versana_is_premium_feature_enabled( 'premium_advanced_lazy_load' ) ) {
        $custom_css .= "
            .versana-lazy-pro { opacity: 0; filter: blur(12px); transition: opacity .35s ease, filter .35s ease; }
            .versana-lazy-pro.is-loaded { opacity: 1; filter: blur(0); }
        ";
        wp_enqueue_script( 'versana-lazy-pro', VERSANA_COMPANION_URL . '/assets/js/versana-lazy-pro.js', array(), VERSANA_COMPANION_VERSION, true );
    }

    // Reading Progress CSS
    if ( versana_is_premium_feature_enabled( 'premium_reading_progress' ) && is_single() ){
        $top_offset = is_admin_bar_showing() ? '32px' : '0';
        $custom_css .= "
            #versana-reading-progress { 
                position: fixed !important; 
                top: " . esc_attr( $top_offset ) . " !important; 
                left: 0 !important; 
                width: 0%; 
                height: 4px !important; /* Increased height slightly for visibility */
                background: #764ba2 !important; /* Solid fallback color */
                background: linear-gradient(to right, #667eea, #764ba2) !important; 
                z-index: 999999 !important; /* Extremely high z-index to stay on top */
                transition: width 0.1s ease;
                display: block !important;
                pointer-events: none; /* Ensures it doesn't block clicks on links below it */
            }
            @media screen and (max-width: 782px) { 
                .admin-bar #versana-reading-progress { top: 46px !important; } 
            }
        ";
        
        // Inline JS for Progress Bar
        $progress_js = "
            window.addEventListener('scroll', function() {
                const content = document.querySelector('.versana-content') || document.querySelector('article');
                const progressBar = document.getElementById('versana-reading-progress');
                if (content && progressBar) {
                    const contentHeight = content.offsetHeight;
                    const contentTop = content.offsetTop;
                    const progress = ((window.scrollY - contentTop) / (contentHeight - window.innerHeight)) * 100;
                    progressBar.style.width = Math.max(0, Math.min(progress, 100)) + '%';
                }
            });
        ";
        wp_add_inline_script( 'versana-lazy-pro', $progress_js );
    }

    if ( ! empty( $custom_css ) ) {
        wp_add_inline_style( $handle, $custom_css );
    }
}

// ============================================================================
// PERFORMANCE FEATURES
// ============================================================================

function versana_pro_lazy_add_attributes( $attr, $attachment, $size ) {
    if ( isset( $attr['loading'] ) && 'lazy' === $attr['loading'] ) {
        if ( versana_pro_is_critical_image( $attachment->ID ) ) {
            return $attr;
        }
        $attr['class'] = isset( $attr['class'] ) ? $attr['class'] . ' versana-lazy-pro' : 'versana-lazy-pro';
        $attr['decoding'] = 'async';
    }
    return $attr;
}

function versana_pro_enhance_content_images( $content ) {
    if ( false === strpos( $content, '<img' ) ) {
        return $content;
    }
    libxml_use_internal_errors( true );
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    libxml_clear_errors();

    $images = $dom->getElementsByTagName( 'img' );
    $first = true;
    foreach ( $images as $img ) {
        if ( $img->getAttribute( 'loading' ) !== 'lazy' ) continue;
        if ( $first ) { $first = false; continue; }
        
        $existing = $img->getAttribute( 'class' );
        if ( strpos( $existing, 'versana-lazy-pro' ) === false ) {
            $img->setAttribute( 'class', trim( $existing . ' versana-lazy-pro' ) );
        }
        if ( ! $img->hasAttribute( 'decoding' ) ) {
            $img->setAttribute( 'decoding', 'async' );
        }
    }
    return $dom->saveHTML();
}

function versana_pro_is_critical_image( $attachment_id ) {
    static $seen = array();
    if ( empty( $seen ) ) {
        $seen[] = $attachment_id;
        return true;
    }
    return false;
}

// ============================================================================
// LAYOUT FEATURES
// ============================================================================

function versana_pro_breadcrumbs() {
    if ( is_front_page() ) return;
    
    $breadcrumbs = array();
    $breadcrumbs[] = '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'versana-companion' ) . '</a>';
    
    if ( is_category() || is_single() ) {
        $category = get_the_category();
        if ( ! empty( $category ) ) {
            $breadcrumbs[] = '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
        }
    }
    
    if ( is_single() || is_page() ) {
        if ( is_page() ) {
            $parents = get_post_ancestors( get_the_ID() );
            if ( $parents ) {
                foreach ( array_reverse( $parents ) as $parent_id ) {
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . esc_html( get_the_title( $parent_id ) ) . '</a>';
                }
            }
        }
        $breadcrumbs[] = '<span>' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_search() ) {
        /* translators: %s: the search query string */
        $breadcrumbs[] = '<span>' . esc_html( sprintf( __( 'Search Results for "%s"', 'versana-companion' ), get_search_query() ) ) . '</span>';
    } elseif ( is_archive() ) {
        $breadcrumbs[] = '<span>' . esc_html( get_the_archive_title() ) . '</span>';
    } elseif ( is_404() ) {
        $breadcrumbs[] = '<span>' . esc_html__( '404 Not Found', 'versana-companion' ) . '</span>';
    }
    
    echo '<nav class="versana-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'versana-companion' ) . '" style="padding: 15px 0; font-size: 14px;">';
    echo wp_kses_post( implode( ' <span>&rsaquo;</span> ', $breadcrumbs ) );
    echo '</nav>';
}

function versana_pro_add_breadcrumbs_to_content() {
    if ( is_singular() && ! is_front_page() ) {
        versana_pro_breadcrumbs();
    }
}

function versana_pro_reading_progress_markup() {
    if ( is_single() ) {
        echo '<div id="versana-reading-progress"></div>';
    }
}

function versana_pro_related_posts() {
    if ( ! is_single() ) return;
    
    $categories = get_the_category();
    if ( empty( $categories ) ) return;

    $current_id = get_the_ID();
    $related = new WP_Query( array(
        'category__in'   => array( $categories[0]->term_id ),
        'posts_per_page' => 4, 
        'orderby'        => 'rand',
        'no_found_rows'  => true,
    ) );
    
    if ( ! $related->have_posts() ) return;

    $count = 0;
    ?>
    <div class="versana-related-posts" style="margin: 40px 0; padding: 30px 0;">
        <h3 style="margin: 0 0 20px 0; font-size: 24px;"><?php esc_html_e( 'Related Articles', 'versana-companion' ); ?></h3>
        <div class="related-posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            <?php while ( $related->have_posts() ) : $related->the_post(); 
                if ( get_the_ID() === $current_id || $count >= 3 ) continue;
            ?>
                <article style="border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" style="display: block;">
                            <?php the_post_thumbnail( 'medium', array( 'style' => 'width: 100%; height: 200px; object-fit: cover; display: block;' ) ); ?>
                        </a>
                    <?php endif; ?>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 10px 0; font-size: 18px; line-height: 1.4;">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" style="text-decoration: none; color: inherit;"><?php the_title(); ?></a>
                        </h4>
                        <div style="font-size: 13px;margin-bottom: 10px;"><?php echo esc_html( get_the_date() ); ?></div>
                        <div style="font-size: 14px;line-height: 1.6;"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 15 ) ); ?></div>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" style="display: inline-block; margin-top: 10px;font-weight: 500;">
                            <?php esc_html_e( 'Read More →', 'versana-companion' ); ?>
                        </a>
                    </div>
                </article>
            <?php $count++; endwhile; ?>
        </div>
    </div>
    <?php wp_reset_postdata();
}