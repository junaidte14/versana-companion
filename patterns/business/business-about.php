<?php
/**
 * Title: Business About
 * Slug: versana/business-about
 * Categories: versana-patterns
 * Keywords: about, simple about
 * Block Types: core/group
 * Description: A simple way to show about us information.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
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
            <?php echo esc_html__( 'About Our Company', 'versana-companion' ); ?>
        </h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-100","fontSize":"md"} -->
        <p class="has-text-align-center has-neutral-100-color has-text-color has-md-font-size">
            <?php echo esc_html__( 'Building the future of digital business', 'versana-companion' ); ?>
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
    <h2 class="wp-block-heading"><?php echo esc_html__( 'Our Story', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">
        <?php echo esc_html__( 'We help businesses navigate digital transformation with innovative solutions and strategic expertise.', 'versana-companion' ); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading"><?php echo esc_html__( 'Our Mission', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"md"} -->
    <p class="has-md-font-size">
        <?php echo esc_html__( 'To empower businesses with technology solutions that drive growth and create competitive advantages.', 'versana-companion' ); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading"><?php echo esc_html__( 'Our Values', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:list -->
    <ul class="wp-block-list">
        <li><strong><?php echo esc_html__( 'Excellence:', 'versana-companion' ); ?></strong> <?php echo esc_html__( 'We deliver exceptional results', 'versana-companion' ); ?></li>
        <li><strong><?php echo esc_html__( 'Innovation:', 'versana-companion' ); ?></strong> <?php echo esc_html__( 'We embrace new technologies', 'versana-companion' ); ?></li>
        <li><strong><?php echo esc_html__( 'Integrity:', 'versana-companion' ); ?></strong> <?php echo esc_html__( 'We build trust through transparency', 'versana-companion' ); ?></li>
        <li><strong><?php echo esc_html__( 'Collaboration:', 'versana-companion' ); ?></strong> <?php echo esc_html__( 'We work as partners', 'versana-companion' ); ?></li>
    </ul>
    <!-- /wp:list -->

</div>
<!-- /wp:group -->