<?php
/**
 * Title: Menu Showcase
 * Slug: versana/menu-showcase
 * Categories: versana-companion
 * Keywords: menu, food, dishes, specialties
 * Description: Featured menu items grid with prices and descriptions
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-200-background-color has-background"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--md)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"textColor":"primary","fontSize":"sm"} -->
        <p class="has-text-align-center has-primary-color has-text-color has-sm-font-size"
            style="margin-bottom:var(--wp--preset--spacing--sm);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">
            Our Specialties</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"clamp(2rem, 5vw, 3.5rem)"}},"fontFamily":"system-serif"} -->
        <h2 class="wp-block-heading has-text-align-center has-system-serif-font-family"
            style="font-size:clamp(2rem, 5vw, 3.5rem)">Signature Dishes</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"lg"} -->
        <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)">Crafted with
            passion using the finest seasonal ingredients</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"has-shadow-sm","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-shadow-sm has-neutral-100-background-color has-background"
                style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:cover {"overlayColor":"neutral-300","isUserOverlayColor":true,"minHeight":220,"minHeightUnit":"px","contentPosition":"center center","isDark":false,"style":{"border":{"radius":{"top":"8px","right":"8px"}}}} -->
                <div class="wp-block-cover is-light" style="min-height:220px"><span aria-hidden="true"
                        class="wp-block-cover__background has-neutral-300-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"4rem"}}} -->
                        <p class="has-text-align-center" style="font-size:4rem">🥩</p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"
                    style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"fontSize":"xl","fontFamily":"system-serif"} -->
                        <h3 class="wp-block-heading has-system-serif-font-family has-xl-font-size">Grilled Ribeye</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"textColor":"primary","fontSize":"lg"} -->
                        <p class="has-primary-color has-text-color has-lg-font-size" style="font-weight:700">$38</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:paragraph {"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size">Prime aged beef, herb butter,
                        seasonal vegetables, truffle mashed potatoes</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
                        <!-- wp:paragraph {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|sm","bottom":"4px","left":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200","fontSize":"xs"} -->
                        <p class="has-neutral-200-background-color has-background has-xs-font-size"
                            style="border-radius:12px;padding-top:4px;padding-right:var(--wp--preset--spacing--sm);padding-bottom:4px;padding-left:var(--wp--preset--spacing--sm)">
                            Gluten-Free</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|sm","bottom":"4px","left":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200","fontSize":"xs"} -->
                        <p class="has-neutral-200-background-color has-background has-xs-font-size"
                            style="border-radius:12px;padding-top:4px;padding-right:var(--wp--preset--spacing--sm);padding-bottom:4px;padding-left:var(--wp--preset--spacing--sm)">
                            Chef's Favorite</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"has-shadow-sm","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-shadow-sm has-neutral-100-background-color has-background"
                style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:cover {"overlayColor":"neutral-300","isUserOverlayColor":true,"minHeight":220,"minHeightUnit":"px","contentPosition":"center center","isDark":false,"style":{"border":{"radius":{"top":"8px","right":"8px"}}}} -->
                <div class="wp-block-cover is-light" style="min-height:220px"><span aria-hidden="true"
                        class="wp-block-cover__background has-neutral-300-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"4rem"}}} -->
                        <p class="has-text-align-center" style="font-size:4rem">🦞</p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"
                    style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"fontSize":"xl","fontFamily":"system-serif"} -->
                        <h3 class="wp-block-heading has-system-serif-font-family has-xl-font-size">Lobster Thermidor
                        </h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"textColor":"primary","fontSize":"lg"} -->
                        <p class="has-primary-color has-text-color has-lg-font-size" style="font-weight:700">$45</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:paragraph {"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size">Fresh Atlantic lobster, cognac
                        cream sauce, parmesan crust, asparagus</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
                        <!-- wp:paragraph {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|sm","bottom":"4px","left":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200","fontSize":"xs"} -->
                        <p class="has-neutral-200-background-color has-background has-xs-font-size"
                            style="border-radius:12px;padding-top:4px;padding-right:var(--wp--preset--spacing--sm);padding-bottom:4px;padding-left:var(--wp--preset--spacing--sm)">
                            Signature Dish</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"has-shadow-sm","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-shadow-sm has-neutral-100-background-color has-background"
                style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:cover {"overlayColor":"neutral-300","isUserOverlayColor":true,"minHeight":220,"minHeightUnit":"px","contentPosition":"center center","isDark":false,"style":{"border":{"radius":{"top":"8px","right":"8px"}}}} -->
                <div class="wp-block-cover is-light" style="min-height:220px"><span aria-hidden="true"
                        class="wp-block-cover__background has-neutral-300-background-color has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"4rem"}}} -->
                        <p class="has-text-align-center" style="font-size:4rem">🍝</p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"
                    style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"fontSize":"xl","fontFamily":"system-serif"} -->
                        <h3 class="wp-block-heading has-system-serif-font-family has-xl-font-size">Truffle Risotto</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"textColor":"primary","fontSize":"lg"} -->
                        <p class="has-primary-color has-text-color has-lg-font-size" style="font-weight:700">$28</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:paragraph {"textColor":"neutral-700","fontSize":"sm"} -->
                    <p class="has-neutral-700-color has-text-color has-sm-font-size">Arborio rice, wild mushrooms, black
                        truffle shavings, aged parmesan</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
                        <!-- wp:paragraph {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|sm","bottom":"4px","left":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200","fontSize":"xs"} -->
                        <p class="has-neutral-200-background-color has-background has-xs-font-size"
                            style="border-radius:12px;padding-top:4px;padding-right:var(--wp--preset--spacing--sm);padding-bottom:4px;padding-left:var(--wp--preset--spacing--sm)">
                            Vegetarian</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|sm","bottom":"4px","left":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200","fontSize":"xs"} -->
                        <p class="has-neutral-200-background-color has-background has-xs-font-size"
                            style="border-radius:12px;padding-top:4px;padding-right:var(--wp--preset--spacing--sm);padding-bottom:4px;padding-left:var(--wp--preset--spacing--sm)">
                            Gluten-Free</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--2-xl)">
        <!-- wp:button {"backgroundColor":"primary","textColor":"neutral-100","style":{"border":{"radius":"4px"}}} -->
        <div class="wp-block-button"><a
                class="wp-block-button__link has-neutral-100-color has-primary-background-color has-text-color has-background wp-element-button"
                style="border-radius:4px">View Full Menu</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->