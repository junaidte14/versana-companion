<?php
/**
 * Title: Boutique Hero Fullscreen
 * Slug: versana/boutique-hero-fullscreen
 * Categories: versana-patterns
 * Keywords: hero, fullscreen, boutique
 * Description: Full-screen hero with minimal text overlay
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    
    <!-- wp:cover {"dimRatio":40,"overlayColor":"primary","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
    <div class="wp-block-cover alignfull is-light" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container">
        
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|md","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--md)">
            
            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl", "bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl)">
                
                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.2em","fontWeight":"300"},"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"textColor":"neutral-100","fontSize":"sm"} -->
                <p class="has-text-align-center has-neutral-100-color has-text-color has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--md);font-weight:300;letter-spacing:0.2em;text-transform:uppercase"><?php echo esc_html__( 'Spring Collection 2026', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3rem, 8vw, 6rem)","fontWeight":"300","lineHeight":"1.1","letterSpacing":"0.05em","fontStyle":"italic"},"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"neutral-100","fontFamily":"system-serif"} -->
                <h1 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color has-system-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--xl);font-size:clamp(3rem, 8vw, 6rem);font-style:italic;font-weight:300;letter-spacing:0.05em;line-height:1.1"><?php echo esc_html__( 'Timeless Elegance', 'versana-companion' ); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"textColor":"neutral-100","fontSize":"lg"} -->
                <p class="has-text-align-center has-neutral-100-color has-text-color has-lg-font-size" style="margin-bottom:var(--wp--preset--spacing--2-xl)"><?php echo esc_html__( 'Discover curated pieces that define sophistication', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"neutral-100","textColor":"primary","style":{"border":{"radius":"0"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-neutral-100-background-color has-text-color has-background wp-element-button" style="border-radius:0;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--2-xl)"><?php echo esc_html__( 'SHOP COLLECTION', 'versana-companion' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

    </div></div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->