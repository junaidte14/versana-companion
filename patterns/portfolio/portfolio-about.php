<?php
/**
 * Title: Portfolio About
 * Slug: versana/portfolio-about
 * Categories: versana-patterns
 * Keywords: about, simple about
 * Block Types: core/group
 * Description: A simple way to show about us information for portfolio.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
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
        <?php echo esc_html__( 'About Me', 'versana-companion' ); ?>
    </h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
    <p class="has-text-align-center has-lg-font-size">
        <?php echo esc_html__( 'Designer. Creator. Problem Solver.', 'versana-companion' ); ?>
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
        <?php echo esc_html__( "I'm a multidisciplinary designer passionate about creating work that resonates. With years of experience, I help brands tell their stories through design.", 'versana-companion' ); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading"><?php echo esc_html__( 'What I Believe', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>
        <?php echo esc_html__( 'Great design solves problems and creates meaningful connections. I approach every project with curiosity and dedication.', 'versana-companion' ); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading"><?php echo esc_html__( 'Expertise', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:list -->
    <ul class="wp-block-list">
        <li><?php echo esc_html__( 'Brand identity and visual systems', 'versana-companion' ); ?></li>
        <li><?php echo esc_html__( 'Web and mobile interface design', 'versana-companion' ); ?></li>
        <li><?php echo esc_html__( 'User experience and research', 'versana-companion' ); ?></li>
        <li><?php echo esc_html__( 'Creative direction', 'versana-companion' ); ?></li>
    </ul>
    <!-- /wp:list -->

</div>
<!-- /wp:group -->