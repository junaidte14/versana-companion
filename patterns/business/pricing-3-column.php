<?php
/**
 * Title: Pricing Three Columns
 * Slug: versana/pricing-3-column
 * Categories: versana-business
 * Keywords: pricing, plans, subscription, packages
 * Block Types: core/group
 * Description: Three column pricing table with popular plan highlighted.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"4-xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size">Simple, Transparent Pricing</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"lg"} -->
        <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)">Choose the plan that's right for you</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-border-color has-neutral-300-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
            
            <!-- wp:heading {"level":3,"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size">Starter</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--xs)">Perfect for individuals</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
                <p style="font-size:3rem;font-weight:700;line-height:1">$29</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">/month</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-checkmark-list"} -->
            <ul class="is-style-checkmark-list" style="padding-left:0">
                <li>5 Projects</li>
                <li>10 GB Storage</li>
                <li>Email Support</li>
                <li>Basic Analytics</li>
                <li>SSL Certificate</li>
            </ul>
            <!-- /wp:list -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:6px">Get Started</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}},"border":{"radius":"8px","width":"2px"}},"borderColor":"primary","backgroundColor":"neutral-100","className":"has-shadow-lg"} -->
        <div class="wp-block-column has-shadow-lg has-border-color has-primary-border-color has-neutral-100-background-color has-background" style="border-width:2px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
            
            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}},"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"backgroundColor":"primary","textColor":"neutral-100","fontSize":"xs","fontFamily":"system-sans"} -->
            <p class="has-text-align-center has-neutral-100-color has-primary-background-color has-text-color has-background has-link-color has-system-sans-font-family has-xs-font-size" style="border-radius:4px;margin-bottom:var(--wp--preset--spacing--md)">MOST POPULAR</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size">Professional</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--xs)">For growing businesses</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
                <p style="font-size:3rem;font-weight:700;line-height:1">$79</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">/month</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-checkmark-list"} -->
            <ul class="is-style-checkmark-list" style="padding-left:0">
                <li>Unlimited Projects</li>
                <li>100 GB Storage</li>
                <li>Priority Support</li>
                <li>Advanced Analytics</li>
                <li>Custom Domain</li>
                <li>API Access</li>
            </ul>
            <!-- /wp:list -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:6px">Get Started</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-border-color has-neutral-300-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
            
            <!-- wp:heading {"level":3,"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size">Enterprise</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--xs)">For large organizations</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
                <p style="font-size:3rem;font-weight:700;line-height:1">$199</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">/month</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-checkmark-list"} -->
            <ul class="is-style-checkmark-list" style="padding-left:0">
                <li>Unlimited Everything</li>
                <li>1 TB Storage</li>
                <li>24/7 Phone Support</li>
                <li>Custom Analytics</li>
                <li>White Label</li>
                <li>Dedicated Manager</li>
                <li>SLA Guarantee</li>
            </ul>
            <!-- /wp:list -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:6px">Contact Sales</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->