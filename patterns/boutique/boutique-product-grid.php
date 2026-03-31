<?php
/**
 * Title: Boutique Product Grid
 * Slug: versana/boutique-product-grid
 * Categories: versana-patterns
 * Keywords: products, shop, grid, catalog
 * Description: Minimal product grid with hover effects
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"italic","fontWeight":"300","letterSpacing":"0.03em"}},"fontFamily":"system-serif","fontSize":"4-xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-system-serif-font-family has-4-xl-font-size" style="font-style:italic;font-weight:300;letter-spacing:0.03em"><?php echo esc_html__( 'New Arrivals', 'versana-companion' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"md"} -->
        <p class="has-text-align-center has-md-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Handpicked pieces for the modern wardrobe', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","right":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|4xl"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--4-xl)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"8rem"}}} -->
                    <p class="has-text-align-center" style="font-size:8rem">👗</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--lg);padding-right:0;padding-bottom:0;padding-left:0">
                    
                    <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"xs"} -->
                    <p class="has-xs-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html__( 'Silk Midi Dress', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size" style="font-style:italic"><?php echo esc_html__( 'Ivory', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"md"} -->
                    <p class="has-md-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( '$485', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","right":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|4xl"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--4-xl)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"8rem"}}} -->
                    <p class="has-text-align-center" style="font-size:8rem">👚</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--lg);padding-right:0;padding-bottom:0;padding-left:0">
                    
                    <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"xs"} -->
                    <p class="has-xs-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html__( 'Cashmere Sweater', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size" style="font-style:italic"><?php echo esc_html__( 'Camel', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"md"} -->
                    <p class="has-md-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( '$325', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","right":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|4xl"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--4-xl)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"8rem"}}} -->
                    <p class="has-text-align-center" style="font-size:8rem">👖</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--lg);padding-right:0;padding-bottom:0;padding-left:0">
                    
                    <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"xs"} -->
                    <p class="has-xs-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html__( 'Wide Leg Trousers', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size" style="font-style:italic"><?php echo esc_html__( 'Navy', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"md"} -->
                    <p class="has-md-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( '$265', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","right":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|4xl"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--4-xl)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"8rem"}}} -->
                    <p class="has-text-align-center" style="font-size:8rem">🧥</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--lg);padding-right:0;padding-bottom:0;padding-left:0">
                    
                    <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"xs"} -->
                    <p class="has-xs-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html__( 'Wool Blazer', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size" style="font-style:italic"><?php echo esc_html__( 'Charcoal', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"md"} -->
                    <p class="has-md-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( '$595', 'versana-companion' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--2-xl)">
        <!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"0"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}}} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="border-radius:0;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--2-xl)"><?php echo esc_html__( 'VIEW ALL PRODUCTS', 'versana-companion' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->