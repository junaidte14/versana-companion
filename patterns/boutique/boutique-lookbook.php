<?php
/**
 * Title: Boutique Lookbook
 * Slug: versana/boutique-lookbook
 * Categories: versana-patterns
 * Keywords: lookbook, editorial, style, collection
 * Description: Editorial lookbook section with image and text
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull has-neutral-200-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    
    <!-- wp:columns {"verticalAlignment":"center","align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns alignfull are-vertically-aligned-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:50%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","right":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|4xl"},"blockGap":"0"},"dimensions":{"minHeight":"600px"}},"backgroundColor":"primary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group has-primary-background-color has-background" style="min-height:600px;padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--4-xl)">
                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"12rem"}},"textColor":"secondary"} -->
                <p class="has-text-align-center has-secondary-color has-text-color" style="font-size:12rem">👔</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","right":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|4xl"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--4-xl);flex-basis:50%">
            
            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.2em"}},"fontSize":"xs"} -->
            <p class="has-xs-font-size" style="letter-spacing:0.2em;text-transform:uppercase"><?php echo esc_html__( 'Lookbook — Spring 2026', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":2,"style":{"typography":{"fontStyle":"italic","fontWeight":"300","letterSpacing":"0.02em"},"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"fontFamily":"system-serif","fontSize":"3-xl"} -->
            <h2 class="wp-block-heading has-system-serif-font-family has-3-xl-font-size" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg);font-style:italic;font-weight:300;letter-spacing:0.02em"><?php echo esc_html__( 'Modern Minimalism', 'versana-companion' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"fontSize":"md"} -->
            <p class="has-md-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)"><?php echo esc_html__( 'Clean lines meet effortless sophistication. Our Spring collection celebrates the beauty of simplicity with timeless pieces crafted from the finest materials.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--xl)"><?php echo esc_html__( 'Each garment is thoughtfully designed to transcend seasons, offering versatility and enduring style for the modern wardrobe.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"0"}}} -->
                <div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="border-radius:0"><?php echo esc_html__( 'EXPLORE COLLECTION', 'versana-companion' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->