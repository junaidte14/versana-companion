<?php
/**
 * Title: Stats Four Columns
 * Slug: versana/stats-4-column
 * Categories: versana-patterns
 * Keywords: stats, numbers, metrics, counters, achievements
 * Block Types: core/group
 * Description: Four column statistics section showcasing key metrics and achievements.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"gradient":"primary-gradient","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-gradient-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--md)">
    
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"4rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:4rem;font-weight:700;line-height:1"><?php echo esc_html__( '10K+', 'versana-companion' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"md"} -->
                <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color has-md-font-size"><?php echo esc_html__( 'Active Users', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"4rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:4rem;font-weight:700;line-height:1"><?php echo esc_html__( '500+', 'versana-companion' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"md"} -->
                <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color has-md-font-size"><?php echo esc_html__( 'Projects Completed', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"4rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:4rem;font-weight:700;line-height:1"><?php echo esc_html__( '98%', 'versana-companion' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"md"} -->
                <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color has-md-font-size"><?php echo esc_html__( 'Client Satisfaction', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"4rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:4rem;font-weight:700;line-height:1"><?php echo esc_html__( '15+', 'versana-companion' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"md"} -->
                <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color has-md-font-size"><?php echo esc_html__( 'Years Experience', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->