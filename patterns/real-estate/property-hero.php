<?php
/**
 * Title: Property Hero with Search
 * Slug: versana/property-hero
 * Categories: versana-real-estate
 * Keywords: hero, search, properties, real estate
 * Description: Hero section with property search functionality
 */
?>
<!-- wp:cover {"url":"","dimRatio":60,"overlayColor":"tertiary","isUserOverlayColor":true,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
<div class="wp-block-cover alignfull"
    style="padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--md);">
    <span aria-hidden="true"
        class="wp-block-cover__background has-tertiary-background-color has-background-dim-60 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"1000px"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(2.5rem, 7vw, 5rem)","fontWeight":"700","lineHeight":"1.1","letterSpacing":"-0.02em"},"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"textColor":"neutral-100"} -->
            <h1 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color"
                style="margin-bottom:var(--wp--preset--spacing--md);font-size:clamp(2.5rem, 7vw, 5rem);font-weight:700;letter-spacing:-0.02em;line-height:1.1">
                Find Your Dream Home</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"textColor":"neutral-200","fontSize":"xl"} -->
            <p class="has-text-align-center has-neutral-200-color has-text-color has-xl-font-size"
                style="margin-bottom:var(--wp--preset--spacing--2-xl)">Discover exceptional properties in prime
                locations. Your perfect home awaits.</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"has-shadow-xl","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"12px"}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-shadow-xl has-neutral-100-background-color has-background"
                style="border-radius:12px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
                <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","fontSize":"lg"} -->
                <h3 class="wp-block-heading has-tertiary-color has-text-color has-link-color has-lg-font-size"
                    style="margin-bottom:var(--wp--preset--spacing--lg)">Search Properties</h3>
                <!-- /wp:heading -->

                <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
                    <div class="wp-block-column" style="flex-basis:33.33%">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","fontSize":"sm"} -->
                            <p class="has-tertiary-color has-text-color has-link-color has-sm-font-size"
                                style="font-weight:600">Location</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|md","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|md"}},"border":{"radius":"6px","width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"backgroundColor":"neutral-200","textColor":"tertiary","borderColor":"neutral-300"} -->
                            <p class="has-border-color has-neutral-300-border-color has-tertiary-color has-neutral-200-background-color has-text-color has-background has-link-color"
                                style="border-width:1px;border-radius:6px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--md)">
                                📍 City, Neighborhood, ZIP</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":"33.33%"} -->
                    <div class="wp-block-column" style="flex-basis:33.33%">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"sm"} -->
                            <p class="has-sm-font-size" style="font-weight:600">Property Type</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|md","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|md"}},"border":{"radius":"6px","width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"backgroundColor":"neutral-200","textColor":"tertiary","borderColor":"neutral-300"} -->
                            <p class="has-border-color has-neutral-300-border-color has-tertiary-color has-neutral-200-background-color has-text-color has-background has-link-color"
                                style="border-width:1px;border-radius:6px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--md)">
                                🏠 All Types</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":"33.33%"} -->
                    <div class="wp-block-column" style="flex-basis:33.33%">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"sm"} -->
                            <p class="has-sm-font-size" style="font-weight:600">Price Range</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|md","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|md"}},"border":{"radius":"6px","width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"backgroundColor":"neutral-200","textColor":"tertiary","borderColor":"neutral-300"} -->
                            <p class="has-border-color has-neutral-300-border-color has-tertiary-color has-neutral-200-background-color has-text-color has-background has-link-color"
                                style="border-width:1px;border-radius:6px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--md)">
                                💰 Any Price</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                    <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a
                            class="wp-block-button__link wp-element-button" style="border-radius:6px">Search
                            Properties</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"neutral-700","fontSize":"sm"} -->
                <p class="has-text-align-center has-neutral-700-color has-text-color has-sm-font-size"
                    style="margin-top:var(--wp--preset--spacing--md)"><em>Install a property search plugin to enable
                        advanced filtering</em></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl"},"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--2-xl)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"neutral-100"} -->
                    <p class="has-neutral-100-color has-text-color" style="font-size:2rem;font-weight:700">2,500+</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-200","fontSize":"sm"} -->
                    <p class="has-neutral-200-color has-text-color has-sm-font-size">Properties</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:paragraph {"textColor":"neutral-300"} -->
                <p class="has-neutral-300-color has-text-color">|</p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"neutral-100"} -->
                    <p class="has-neutral-100-color has-text-color" style="font-size:2rem;font-weight:700">50+</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-200","fontSize":"sm"} -->
                    <p class="has-neutral-200-color has-text-color has-sm-font-size">Locations</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:paragraph {"textColor":"neutral-300"} -->
                <p class="has-neutral-300-color has-text-color">|</p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"neutral-100"} -->
                    <p class="has-neutral-100-color has-text-color" style="font-size:2rem;font-weight:700">98%</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-200","fontSize":"sm"} -->
                    <p class="has-neutral-200-color has-text-color has-sm-font-size">Satisfaction</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->