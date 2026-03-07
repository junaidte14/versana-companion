<?php
/**
 * Title: Blog Hero
 * Slug: versana/blog-hero
 * Categories: versana-blog
 * Keywords: hero, banner
 * Description: A simple hero banner for blogs.
 */
?>
<!-- wp:cover {"overlayColor":"primary","isUserOverlayColor":true,"gradient":"primary-gradient","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignfull"
    style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;">
    <span aria-hidden="true"
        class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim has-background-gradient has-primary-gradient-gradient-background"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"
            style="padding-top:var(--wp--preset--spacing--2-xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2-xl);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|md"}},"typography":{"fontSize":"clamp(2.5rem, 8vw, 5rem)","fontWeight":"800","letterSpacing":"-0.02em","lineHeight":"1.1"}},"textColor":"neutral-100"} -->
            <h1 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color"
                style="margin-top:0;margin-bottom:var(--wp--preset--spacing--md);font-size:clamp(2.5rem, 8vw, 5rem);font-weight:800;letter-spacing:-0.02em;line-height:1.1">
                Welcome to My Blog
            </h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|lg"}},"typography":{"fontSize":"clamp(1.125rem, 2.5vw, 1.5rem)","lineHeight":"1.6"}},"textColor":"neutral-100"} -->
            <p class="has-text-align-center has-neutral-100-color has-text-color"
                style="margin-top:0;margin-bottom:var(--wp--preset--spacing--lg);font-size:clamp(1.125rem,2.5vw,1.5rem);line-height:1.6">
                Sharing stories, insights, and inspiration 
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"neutral-100","textColor":"primary","style":{"border":{"radius":"50px"},"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xl","right":"var:preset|spacing|xl"}},"typography":{"fontSize":"1.125rem","fontWeight":"600"}}} -->
                <div class="wp-block-button"><a
                        class="wp-block-button__link has-primary-color has-neutral-100-background-color has-text-color has-background has-custom-font-size wp-element-button"
                        style="border-radius:50px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xl);font-size:1.125rem;font-weight:600">
                        Start Reading
                    </a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->