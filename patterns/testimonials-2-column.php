<?php
/**
 * Title: Testimonials Two Columns
 * Slug: versana/testimonials-2-column
 * Categories: versana-patterns
 * Keywords: testimonials, reviews, clients, quotes
 * Block Types: core/group
 * Description: Two column testimonial layout with client quotes and details.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"4-xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size"><?php echo esc_html__( 'What Our Clients Say', 'versana-companion' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"lg"} -->
        <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( "Don't just take our word for it", 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-border-color has-neutral-300-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
            
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","lineHeight":"1"}},"textColor":"primary"} -->
            <p class="has-primary-color has-text-color" style="font-size:3rem;line-height:1">"</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}},"fontSize":"md"} -->
            <p class="has-md-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'Working with this team transformed our online presence. The results exceeded our expectations and our traffic has doubled in just three months.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","right":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}},"border":{"radius":"50%"},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"neutral-300","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-neutral-300-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2rem"}}} -->
                    <p class="has-text-align-center" style="font-size:2rem">👤</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                    <p style="margin-top:0;margin-bottom:0;font-weight:600"><?php echo esc_html__( 'Sarah Johnson', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'CEO, Tech Startup', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-border-color has-neutral-300-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
            
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","lineHeight":"1"}},"textColor":"primary"} -->
            <p class="has-primary-color has-text-color" style="font-size:3rem;line-height:1">"</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}}},"fontSize":"md"} -->
            <p class="has-md-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'The attention to detail and professional approach made all the difference. They delivered exactly what we needed, on time and within budget.', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","right":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}},"border":{"radius":"50%"},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"neutral-300","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-neutral-300-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2rem"}}} -->
                    <p class="has-text-align-center" style="font-size:2rem">👤</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                    <p style="margin-top:0;margin-bottom:0;font-weight:600"><?php echo esc_html__( 'Michael Chen', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Founder, Design Agency', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->