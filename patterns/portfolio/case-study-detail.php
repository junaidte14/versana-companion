<?php
/**
 * Title: Case Study Detail
 * Slug: versana/case-study-detail
 * Categories: versana-portfolio
 * Keywords: case study, project, portfolio, work, showcase
 * Block Types: core/group
 * Description: Detailed case study layout for showcasing project details and results.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontWeight":"600","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"textColor":"primary","fontSize":"sm"} -->
        <p class="has-primary-color has-text-color has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--sm);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Case Study</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":1,"fontSize":"4-xl"} -->
        <h1 class="wp-block-heading has-4-xl-font-size">E-Commerce Platform Redesign</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"fontSize":"lg"} -->
        <p class="has-lg-font-size" style="margin-top:var(--wp--preset--spacing--md)">How we helped a retail giant increase online sales by 156% through strategic redesign and UX optimization.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-neutral-200-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                <p style="font-weight:600">Client</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">RetailCo Inc.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                <p style="font-weight:600">Industry</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">E-Commerce Retail</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                <p style="font-weight:600">Duration</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">6 Months</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                <p style="font-weight:600">Services</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">UX Design, Development</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:cover {"overlayColor":"neutral-300","isUserOverlayColor":true,"minHeight":500,"minHeightUnit":"px","contentPosition":"center center","isDark":false,"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl"}},"border":{"radius":"12px"}},"className":"has-shadow"} -->
    <div class="wp-block-cover is-light has-shadow" style="border-radius:12px;margin-top:var(--wp--preset--spacing--2-xl);margin-bottom:var(--wp--preset--spacing--2-xl);min-height:500px">
        <span aria-hidden="true" class="wp-block-cover__background has-neutral-300-background-color has-background-dim-100 has-background-dim"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:paragraph {"align":"center","fontSize":"2-xl"} -->
            <p class="has-text-align-center has-2-xl-font-size">📸 Project Screenshot</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Replace with actual project images</p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:heading {"fontSize":"3-xl"} -->
    <h2 class="wp-block-heading has-3-xl-font-size">The Challenge</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">Our client was experiencing declining online sales despite having a strong brand presence. Their e-commerce platform was outdated, mobile experience was poor, and the checkout process had a 68% abandonment rate.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">Key challenges included:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"fontSize":"md"} -->
    <ul class="has-md-font-size">
        <li>Outdated user interface that didn't reflect brand values</li>
        <li>Poor mobile experience (only 12% of traffic converted)</li>
        <li>Complicated checkout process with 7+ steps</li>
        <li>Slow page load times (average 8 seconds)</li>
    </ul>
    <!-- /wp:list -->

    <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl"}}},"className":"is-style-wide"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--2-xl);margin-bottom:var(--wp--preset--spacing--2-xl)"/>
    <!-- /wp:separator -->

    <!-- wp:heading {"fontSize":"3-xl"} -->
    <h2 class="wp-block-heading has-3-xl-font-size">Our Approach</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">We took a data-driven approach, combining user research, competitive analysis, and industry best practices to create a solution that would drive measurable results.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"},"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
    <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--xl)">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-neutral-100-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2.5rem"}}} -->
            <p class="has-text-align-center" style="font-size:2.5rem">🔍</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"lg"} -->
            <h3 class="wp-block-heading has-text-align-center has-lg-font-size">Research</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-700","fontSize":"sm"} -->
            <p class="has-text-align-center has-neutral-700-color has-text-color has-sm-font-size">User interviews, analytics review, competitor analysis</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-neutral-100-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2.5rem"}}} -->
            <p class="has-text-align-center" style="font-size:2.5rem">✏️</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"lg"} -->
            <h3 class="wp-block-heading has-text-align-center has-lg-font-size">Design</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-700","fontSize":"sm"} -->
            <p class="has-text-align-center has-neutral-700-color has-text-color has-sm-font-size">Wireframes, prototypes, user testing iterations</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-neutral-100-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2.5rem"}}} -->
            <p class="has-text-align-center" style="font-size:2.5rem">🚀</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"lg"} -->
            <h3 class="wp-block-heading has-text-align-center has-lg-font-size">Launch</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-700","fontSize":"sm"} -->
            <p class="has-text-align-center has-neutral-700-color has-text-color has-sm-font-size">Phased rollout, monitoring, optimization</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl"}}},"className":"is-style-wide"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--2-xl);margin-bottom:var(--wp--preset--spacing--2-xl)"/>
    <!-- /wp:separator -->

    <!-- wp:heading {"fontSize":"3-xl"} -->
    <h2 class="wp-block-heading has-3-xl-font-size">The Results</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">The redesign exceeded all expectations, delivering significant improvements across all key metrics within the first quarter.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"},"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--xl)">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px"}},"gradient":"primary-gradient","className":"has-shadow"} -->
        <div class="wp-block-column has-shadow has-primary-gradient-gradient-background has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
            <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3.5rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
            <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:3.5rem;font-weight:700;line-height:1">+156%</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100"} -->
            <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color">Increase in Online Sales</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px"}},"gradient":"warm-gradient","className":"has-shadow"} -->
        <div class="wp-block-column has-shadow has-warm-gradient-gradient-background has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
            <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3.5rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
            <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:3.5rem;font-weight:700;line-height:1">-52%</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100"} -->
            <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color">Cart Abandonment Rate</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px"}},"backgroundColor":"success","className":"has-shadow"} -->
        <div class="wp-block-column has-shadow has-success-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
            <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3.5rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
            <h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color" style="font-size:3.5rem;font-weight:700;line-height:1">2.4s</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100"} -->
            <p class="has-text-align-center has-neutral-100-color has-text-color has-link-color">Average Page Load Time</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl"}}},"className":"is-style-wide"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--2-xl);margin-bottom:var(--wp--preset--spacing--2-xl)"/>
    <!-- /wp:separator -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-border-color has-neutral-300-border-color has-neutral-100-background-color has-background" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontStyle":"italic","lineHeight":"1.6"}}} -->
        <p class="has-text-align-center" style="font-size:1.5rem;font-style:italic;line-height:1.6">"The new platform has completely transformed our business. The team's expertise and attention to detail made all the difference."</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
        <!-- /wp:separator -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}}} -->
            <p class="has-text-align-center" style="font-weight:600">Sarah Johnson</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-700","fontSize":"sm"} -->
            <p class="has-text-align-center has-neutral-700-color has-text-color has-sm-font-size">CEO, RetailCo Inc.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->