<?php
/**
 * Title: Portfolio Gallery Grid
 * Slug: versana/portfolio-gallery-grid
 * Categories: versana-patterns
 * Keywords: portfolio, gallery, projects, work, showcase
 * Block Types: core/gallery
 * Description: Professional portfolio gallery grid for showcasing creative work.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"4-xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size"><?php echo esc_html__( 'Featured Work', 'versana-companion' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"lg"} -->
        <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'A selection of recent projects showcasing our creative approach', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
            <div class="wp-block-column" style="flex-basis:66.66%">
                <!-- wp:group {"className":"portfolio-item has-shadow","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group portfolio-item has-shadow"
                    style="border-radius:12px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:cover {"isUserOverlayColor":true,"minHeight":500,"minHeightUnit":"px","gradient":"primary-gradient","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left"
                        style="border-radius:12px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl);min-height:500px">
                        <span aria-hidden="true"
                            class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-gradient-gradient-background"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontWeight":"600","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"textColor":"neutral-900","fontSize":"xs"} -->
                            <p class="has-neutral-900-color has-text-color has-xs-font-size"
                                style="margin-bottom:var(--wp--preset--spacing--xs);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">
                                <?php echo esc_html__( 'Brand Design', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":3,"textColor":"neutral-900","fontSize":"2-xl"} -->
                            <h3 class="wp-block-heading has-neutral-900-color has-text-color has-2-xl-font-size">
                                <?php echo esc_html__( 'E-Commerce Redesign', 'versana-companion' ); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}},"textColor":"neutral-900"} -->
                            <p class="has-neutral-900-color has-text-color has-link-color"><?php echo esc_html__( 'Complete brand refresh for a leading retail company', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"33.33%"} -->
            <div class="wp-block-column" style="flex-basis:33.33%">
                <!-- wp:group {"className":"portfolio-item has-shadow","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group portfolio-item has-shadow"
                    style="border-radius:12px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:cover {"isUserOverlayColor":true,"minHeight":500,"minHeightUnit":"px","gradient":"warm-gradient","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left"
                        style="border-radius:12px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl);min-height:500px">
                        <span aria-hidden="true"
                            class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-warm-gradient-gradient-background"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontWeight":"600","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"textColor":"neutral-900","fontSize":"xs"} -->
                            <p class="has-neutral-900-color has-text-color has-xs-font-size"
                                style="margin-bottom:var(--wp--preset--spacing--xs);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">
                                <?php echo esc_html__( 'Web Design', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":3,"textColor":"neutral-900","fontSize":"xl"} -->
                            <h3 class="wp-block-heading has-neutral-900-color has-text-color has-xl-font-size"><?php echo esc_html__( 'Tech Startup', 'versana-companion' ); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}},"textColor":"neutral-900","fontSize":"sm"} -->
                            <p class="has-neutral-900-color has-text-color has-link-color has-sm-font-size"><?php echo esc_html__( 'Modern website for SaaS platform', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:spacer {"height":"20px"} -->
        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
            <div class="wp-block-column" style="flex-basis:33.33%">
                <!-- wp:group {"className":"portfolio-item has-shadow","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group portfolio-item has-shadow"
                    style="border-radius:12px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:cover {"overlayColor":"warning","isUserOverlayColor":true,"minHeight":400,"minHeightUnit":"px","contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
                    <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left"
                        style="border-radius:12px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl);min-height:400px">
                        <span aria-hidden="true"
                            class="wp-block-cover__background has-warning-background-color has-background-dim-100 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontWeight":"600","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"textColor":"neutral-900","fontSize":"xs"} -->
                            <p class="has-neutral-900-color has-text-color has-xs-font-size"
                                style="margin-bottom:var(--wp--preset--spacing--xs);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">
                                <?php echo esc_html__( 'Mobile App', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":3,"textColor":"neutral-900","fontSize":"xl"} -->
                            <h3 class="wp-block-heading has-neutral-900-color has-text-color has-xl-font-size"><?php echo esc_html__( 'Fitness App', 'versana-companion' ); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}},"textColor":"neutral-900","fontSize":"sm"} -->
                            <p class="has-neutral-900-color has-text-color has-link-color has-sm-font-size"><?php echo esc_html__( 'iOS &amp; Android design', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"33.33%"} -->
            <div class="wp-block-column" style="flex-basis:33.33%">
                <!-- wp:group {"className":"portfolio-item has-shadow","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group portfolio-item has-shadow"
                    style="border-radius:12px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:cover {"overlayColor":"tertiary","isUserOverlayColor":true,"minHeight":400,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left"
                        style="border-radius:12px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl);min-height:400px">
                        <span aria-hidden="true"
                            class="wp-block-cover__background has-tertiary-background-color has-background-dim-100 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontWeight":"600","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"textColor":"neutral-900","fontSize":"xs"} -->
                            <p class="has-neutral-900-color has-text-color has-xs-font-size"
                                style="margin-bottom:var(--wp--preset--spacing--xs);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">
                                <?php echo esc_html__( 'Marketing', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":3,"textColor":"neutral-900","fontSize":"xl"} -->
                            <h3 class="wp-block-heading has-neutral-900-color has-text-color has-xl-font-size"><?php echo esc_html__( 'Campaign Design', 'versana-companion' ); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}},"textColor":"neutral-900","fontSize":"sm"} -->
                            <p class="has-neutral-900-color has-text-color has-link-color has-sm-font-size"><?php echo esc_html__( 'Product launch materials', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"33.33%"} -->
            <div class="wp-block-column" style="flex-basis:33.33%">
                <!-- wp:group {"className":"portfolio-item has-shadow","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group portfolio-item has-shadow"
                    style="border-radius:12px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:cover {"overlayColor":"success","isUserOverlayColor":true,"minHeight":400,"minHeightUnit":"px","contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
                    <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left"
                        style="border-radius:12px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl);min-height:400px">
                        <span aria-hidden="true"
                            class="wp-block-cover__background has-success-background-color has-background-dim-100 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontWeight":"600","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"textColor":"neutral-900","fontSize":"xs"} -->
                            <p class="has-neutral-900-color has-text-color has-xs-font-size"
                                style="margin-bottom:var(--wp--preset--spacing--xs);font-weight:600;letter-spacing:0.1em;text-transform:uppercase">
                                <?php echo esc_html__( 'UX/UI', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":3,"textColor":"neutral-900","fontSize":"xl"} -->
                            <h3 class="wp-block-heading has-neutral-900-color has-text-color has-xl-font-size"><?php echo esc_html__( 'Dashboard UI', 'versana-companion' ); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}},"textColor":"neutral-900","fontSize":"sm"} -->
                            <p class="has-neutral-900-color has-text-color has-link-color has-sm-font-size"><?php echo esc_html__( 'Analytics platform interface', 'versana-companion' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--2-xl)">
        <!-- wp:button {"style":{"border":{"radius":"6px"}}} -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:6px"><?php echo esc_html__( 'View All Projects', 'versana-companion' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->