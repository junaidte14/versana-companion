<?php
/**
 * Title: Business About
 * Slug: versana/business-about
 * Categories: versana-business
 * Keywords: about, simple about
 * Block Types: core/group
 * Description: A simple way to show about us information.
 */
?>
<!-- wp:cover {
    "overlayColor":"primary",
    "minHeight":400,
    "minHeightUnit":"px",
    "contentPosition":"center center",
    "align":"full",
    "isDark":true,
    "style":{
        "spacing":{
            "padding":{
                "top":"var:preset|spacing|xl",
                "bottom":"var:preset|spacing|xl"
            }
        }
    }
} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);min-height:400px">
    <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">

        <!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-100","fontSize":"4-xl"} -->
        <h1 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color has-4-xl-font-size">
            About Our Company
        </h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-100","fontSize":"md"} -->
        <p class="has-text-align-center has-neutral-100-color has-text-color has-md-font-size">
            Building the future of digital business
        </p>
        <!-- /wp:paragraph -->

    </div>
</div>
<!-- /wp:cover -->


<!-- wp:group {
    "align":"wide",
    "layout":{
        "type":"constrained",
        "contentSize":"800px"
    },
    "style":{
        "spacing":{
            "padding":{
                "top":"var:preset|spacing|2xl",
                "bottom":"var:preset|spacing|2xl"
            }
        }
    }
} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading">Our Story</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">
        We help businesses navigate digital transformation with innovative solutions and strategic expertise.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading">Our Mission</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">
        To empower businesses with technology solutions that drive growth and create competitive advantages.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading">Our Values</h2>
    <!-- /wp:heading -->

    <!-- wp:list -->
    <ul class="wp-block-list">
        <li><strong>Excellence:</strong> We deliver exceptional results</li>
        <li><strong>Innovation:</strong> We embrace new technologies</li>
        <li><strong>Integrity:</strong> We build trust through transparency</li>
        <li><strong>Collaboration:</strong> We work as partners</li>
    </ul>
    <!-- /wp:list -->

</div>
<!-- /wp:group -->