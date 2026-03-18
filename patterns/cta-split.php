<?php
/**
 * Title: Call to Action Split
 * Slug: versana/cta-split
 * Categories: versana-patterns
 * Keywords: cta, call to action, button, conversion
 * Block Types: core/group
 * Description: Split layout CTA with content on left and button on right.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"},"margin":{"top":"0","bottom":"0"}}},"gradient":"primary-gradient","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-gradient-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--xl)">
    
    <!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
            <!-- wp:heading {"fontSize":"3-xl"} -->
            <h2 class="wp-block-heading has-3-xl-font-size"><?php echo esc_html__( 'Ready to Get Started?', 'versana-companion' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"lg"} -->
            <p class="has-neutral-100-color has-text-color has-link-color has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Join thousands of satisfied customers and transform your business today. No credit card required.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"neutral-100","textColor":"primary","width":100,"style":{"border":{"radius":"50px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"typography":{"fontSize":"1.125rem","fontWeight":"600"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-color has-neutral-100-background-color has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:50px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);font-size:1.125rem;font-weight:600"><?php echo esc_html__( 'Start Free Trial', 'versana-companion' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"sm"} -->
            <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'No credit card required', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->