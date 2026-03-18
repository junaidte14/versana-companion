<?php
/**
 * Title: Process Timeline Four Steps
 * Slug: versana/process-timeline-4-step
 * Categories: versana-patterns
 * Keywords: process, timeline, steps, workflow, how it works
 * Block Types: core/group
 * Description: Four-step process timeline showing workflow or methodology.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"4-xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size"><?php echo esc_html__( 'How It Works', 'versana-companion' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"lg"} -->
        <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Our proven process delivers results in four simple steps', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|2xl","left":"0"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"25%"} -->
        <div class="wp-block-column" style="flex-basis:25%">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"50%"},"dimensions":{"minHeight":""}},"backgroundColor":"primary","layout":{"type":"constrained"},"className":"step-number"} -->
                <div class="wp-block-group step-number has-primary-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                    <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1">
                        <?php 
                        echo esc_html( sprintf( 
                            /* translators: %d: Step number */
                            __( 'Step %d', 'versana-companion' ), 
                            1 
                        ) ); 
                        ?>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"xl"} -->
                <h3 class="wp-block-heading has-text-align-center has-xl-font-size"><?php echo esc_html__( 'Discovery', 'versana-companion' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-700"} -->
                <p class="has-text-align-center has-neutral-700-color has-text-color"><?php echo esc_html__( 'We learn about your business goals, challenges, and vision for success.', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"25%"} -->
        <div class="wp-block-column" style="flex-basis:25%">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"50%"}},"backgroundColor":"secondary","layout":{"type":"constrained"},"className":"step-number"} -->
                <div class="wp-block-group step-number has-secondary-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                    <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1">
                        <?php 
                        echo esc_html( sprintf( 
                            /* translators: %d: Step number */
                            __( 'Step %d', 'versana-companion' ), 
                            2 
                        ) ); 
                        ?>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"xl"} -->
                <h3 class="wp-block-heading has-text-align-center has-xl-font-size"><?php echo esc_html__( 'Strategy', 'versana-companion' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-700"} -->
                <p class="has-text-align-center has-neutral-700-color has-text-color"><?php echo esc_html__( 'We develop a customized plan tailored to your specific needs and objectives.', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"25%"} -->
        <div class="wp-block-column" style="flex-basis:25%">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"50%"}},"backgroundColor":"tertiary","layout":{"type":"constrained"},"className":"step-number"} -->
                <div class="wp-block-group step-number has-tertiary-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                    <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1">
                        <?php 
                        echo esc_html( sprintf( 
                            /* translators: %d: Step number */
                            __( 'Step %d', 'versana-companion' ), 
                            3 
                        ) ); 
                        ?>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"xl"} -->
                <h3 class="wp-block-heading has-text-align-center has-xl-font-size"><?php echo esc_html__( 'Execution', 'versana-companion' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-700"} -->
                <p class="has-text-align-center has-neutral-700-color has-text-color"><?php echo esc_html__( 'Our team implements the solution with precision and attention to detail.', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"25%"} -->
        <div class="wp-block-column" style="flex-basis:25%">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"radius":"50%"}},"backgroundColor":"success","layout":{"type":"constrained"},"className":"step-number"} -->
                <div class="wp-block-group step-number has-success-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}},"textColor":"neutral-100"} -->
                    <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1">
                        <?php 
                        echo esc_html( sprintf( 
                            /* translators: %d: Step number */
                            __( 'Step %d', 'versana-companion' ), 
                            4 
                        ) ); 
                        ?>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"xl"} -->
                <h3 class="wp-block-heading has-text-align-center has-xl-font-size"><?php echo esc_html__( 'Growth', 'versana-companion' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-700"} -->
                <p class="has-text-align-center has-neutral-700-color has-text-color"><?php echo esc_html__( 'We monitor, optimize, and scale to ensure continuous improvement and results.', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->