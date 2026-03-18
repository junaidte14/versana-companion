<?php
/**
 * Title: Business Services
 * Slug: versana/business-services
 * Categories: versana-patterns
 * Keywords: services, 2 columns, features
 * Block Types: core/group
 * Description: A large section to showcase top business services.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"4-xl"} -->
    <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size"><?php echo esc_html__( 'Our Services', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"md"} -->
    <p class="has-text-align-center has-md-font-size"><?php echo esc_html__( 'Comprehensive solutions for modern businesses', 'versana-companion' ); ?></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignwide" style="padding-bottom:var(--wp--preset--spacing--lg)">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php echo esc_html__( 'Web Development', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Custom websites and web applications built with modern technologies. From simple landing pages to complex platforms.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php echo esc_html__( 'Digital Marketing', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Strategic campaigns across channels to reach your audience and drive conversions. SEO, social media, content marketing.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"},"margin":{"top":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--xl)"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php echo esc_html__( 'Business Consulting', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Expert guidance on strategy, operations, and growth. We help you make informed decisions and achieve your goals.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php echo esc_html__( 'Brand Design', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Visual identity and brand strategy that makes your business stand out. Logos, guidelines, and marketing materials.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->