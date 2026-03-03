<?php
/**
 * Title: About
 * Slug: versana/about
 * Categories: versana-companion
 * Keywords: about, simple about
 * Block Types: core/group
 * Description: A simple way to show about us information.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"4-xl"} -->
    <h1 class="wp-block-heading has-text-align-center has-4-xl-font-size">
        About Me
    </h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
    <p class="has-text-align-center has-lg-font-size">
        Writer, creator, and storyteller
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}}} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"
        style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl)" />
    <!-- /wp:separator -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">
        Welcome to my corner of the internet. I share thoughts, experiences, and insights on topics I'm passionate about.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading">
        What I Write About
    </h2>
    <!-- /wp:heading -->

    <!-- wp:list -->
    <ul class="wp-block-list">
        <li>Personal growth and development</li>
        <li>Creative writing and storytelling</li>
        <li>Technology and innovation</li>
        <li>Life experiences and lessons learned</li>
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph -->
    <p>
        Thanks for stopping by. I hope you find something that resonates with you.
    </p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->