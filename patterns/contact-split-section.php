<?php
/**
 * Title: Contact Split Section
 * Slug: versana/contact-split-section
 * Categories: versana-patterns
 * Keywords: contact, form, get in touch, email, phone
 * Block Types: core/group
 * Description: Two-column contact section with info and form placeholder.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-bottom:var(--wp--preset--spacing--4-xl)">
    
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
            <!-- wp:heading {"fontSize":"4-xl"} -->
            <h2 class="wp-block-heading has-4-xl-font-size"><?php echo esc_html__( "Let's Talk About Your Project", "versana-companion" ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|xl"}}},"fontSize":"lg"} -->
            <p class="has-lg-font-size" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--xl)"><?php echo esc_html__( "Ready to take the next step? Reach out and let's discuss how we can help you achieve your goals.", "versana-companion" ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"border":{"radius":"50%"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-primary-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
                        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-100"} -->
                        <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:1.25rem">📧</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                        <p style="font-weight:600"><?php echo esc_html__( 'Email Us', 'versana-companion' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"textColor":"neutral-700"} -->
                        <p class="has-neutral-700-color has-text-color">hello@example.com</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"border":{"radius":"50%"}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-secondary-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
                        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-100"} -->
                        <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:1.25rem">📞</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                        <p style="font-weight:600"><?php echo esc_html__( 'Call Us', 'versana-companion' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"textColor":"neutral-700"} -->
                        <p class="has-neutral-700-color has-text-color">+1 (555) 123-4567</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"border":{"radius":"50%"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
                        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-100"} -->
                        <p class="has-text-align-center has-neutral-100-color has-text-color" style="font-size:1.25rem">📍</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
                        <p style="font-weight:600"><?php echo esc_html__( 'Visit Us', 'versana-companion' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"textColor":"neutral-700"} -->
                        <p class="has-neutral-700-color has-text-color">123 Business St, Suite 100<br>San Francisco, CA 94102</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"className":"is-style-wide"} -->
            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl)"/>
            <!-- /wp:separator -->

            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
            <p style="font-weight:600"><?php echo esc_html__( 'Office Hours', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color">
                <?php 
                echo esc_html( sprintf( 
                    /* translators: 1: Days of week, 2: Start time, 3: End time */
                    __( '%1$s: %2$s - %3$s', 'versana-companion' ), 
                    __( 'Monday - Friday', 'versana-companion' ), 
                    '9:00 AM', 
                    '6:00 PM' 
                ) ); 
                ?><br>
                <?php 
                echo esc_html( sprintf( 
                    /* translators: 1: Day of the week (e.g. Saturday), 2: Start time (e.g. 10:00 AM), 3: End time (e.g. 4:00 PM) */
                    __( '%1$s: %2$s - %3$s', 'versana-companion' ), 
                    __( 'Saturday', 'versana-companion' ), 
                    '10:00 AM', 
                    '4:00 PM' 
                ) ); 
                ?><br>
                <?php echo esc_html__( 'Sunday: Closed', 'versana-companion' ); ?>
            </p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"55%"} -->
        <div class="wp-block-column" style="flex-basis:55%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl"}},"border":{"radius":"12px"}},"backgroundColor":"neutral-200","className":"has-shadow-md","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-shadow-md has-neutral-200-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--2-xl);padding-right:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl);padding-left:var(--wp--preset--spacing--2-xl)">
                
                <!-- wp:heading {"level":3,"fontSize":"2-xl"} -->
                <h3 class="wp-block-heading has-2-xl-font-size"><?php echo esc_html__( 'Send Us a Message', 'versana-companion' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|xl"}}},"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--xl)"><?php echo esc_html__( "Fill out the form below and we'll get back to you within 24 hours.", 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px","width":"2px","style":"dashed"}},"borderColor":"neutral-300","backgroundColor":"neutral-100"} -->
                <p class="has-border-color has-neutral-300-border-color has-neutral-100-background-color has-background" style="border-style:dashed;border-width:2px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)"><strong>📝 <?php echo esc_html__( 'Contact Form Placeholder', 'versana-companion' ); ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"neutral-700","fontSize":"sm"} -->
                <p class="has-neutral-700-color has-text-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Install a contact form plugin like:', 'versana-companion' ); ?><br>• <strong><?php echo esc_html__( 'Contact Form 7', 'versana-companion' ); ?></strong> <?php echo esc_html__( '(Free)', 'versana-companion' ); ?><br>• <strong><?php echo esc_html__( 'WPForms', 'versana-companion' ); ?></strong> <?php echo esc_html__( '(Freemium)', 'versana-companion' ); ?><br>• <strong><?php echo esc_html__( 'Ninja Forms', 'versana-companion' ); ?></strong> <?php echo esc_html__( '(Free)', 'versana-companion' ); ?><br>• <strong><?php echo esc_html__( 'Gravity Forms', 'versana-companion' ); ?></strong> <?php echo esc_html__( '(Premium)', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"textColor":"neutral-700","fontSize":"sm"} -->
                <p class="has-neutral-700-color has-text-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'Then replace this placeholder with your contact form shortcode.', 'versana-companion' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->