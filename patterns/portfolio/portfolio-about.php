<?php
/**
 * Title: Portfolio About
 * Slug: versana/portfolio-about
 * Categories: versana-portfolio
 * Keywords: about, simple about
 * Block Types: core/group
 * Description: A simple way to show about us information for portfolio.
 */
?>
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

    <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"4-xl"} -->
    <h1 class="wp-block-heading has-text-align-center has-4-xl-font-size">
        About Me
    </h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
    <p class="has-text-align-center has-lg-font-size">
        Designer. Creator. Problem Solver.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:separator {
        "style":{
            "spacing":{
                "margin":{
                    "top":"var:preset|spacing|xl",
                    "bottom":"var:preset|spacing|xl"
                }
            }
        }
    } -->
    <hr class="wp-block-separator has-alpha-channel-opacity"
        style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl)" />
    <!-- /wp:separator -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">
        I'm a multidisciplinary designer passionate about creating work that resonates. With years of experience, I help brands tell their stories through design.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading">What I Believe</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>
        Great design solves problems and creates meaningful connections. I approach every project with curiosity and dedication.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading">Expertise</h2>
    <!-- /wp:heading -->

    <!-- wp:list -->
    <ul class="wp-block-list">
        <li>Brand identity and visual systems</li>
        <li>Web and mobile interface design</li>
        <li>User experience and research</li>
        <li>Creative direction</li>
    </ul>
    <!-- /wp:list -->

</div>
<!-- /wp:group -->