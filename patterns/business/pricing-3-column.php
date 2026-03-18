<?php
/**
 * Title: Pricing Three Columns
 * Slug: versana/pricing-3-column
 * Categories: versana-patterns
 * Keywords: pricing, plans, subscription, packages
 * Block Types: core/group
 * Description: Three column pricing table with popular plan highlighted.
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
        <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size"><?php echo esc_html__( 'Simple, Transparent Pricing', 'versana-companion' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"lg"} -->
        <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( "Choose the plan that's right for you", 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-border-color has-neutral-300-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
            
            <!-- wp:heading {"level":3,"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html__( 'Starter', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Perfect for individuals', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
                <p style="font-size:3rem;font-weight:700;line-height:1">
                    <?php 
                    $versana_price = 29;
                    // translators: %s: The localized price amount
                    $versana_price_format = __( '$%s', 'versana-companion' );
                    echo esc_html( sprintf( 
                        $versana_price_format, 
                        number_format_i18n( $versana_price ) 
                    ) ); 
                    ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">
                    <?php 
                    echo esc_html( sprintf( 
                        /* translators: %s: The time period (e.g., month, year) */
                        __( '/%s', 'versana-companion' ), 
                        __( 'month', 'versana-companion' ) 
                    ) ); 
                    ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-checkmark-list"} -->
            <ul class="is-style-checkmark-list" style="padding-left:0">
                <li>
                    <?php 
                    $versana_projects_count = 5;
                    printf(
                        /* translators: %s: Number of projects */
                        esc_html( _n( '%s Project', '%s Projects', $versana_projects_count, 'versana-companion' ) ),
                        esc_html( number_format_i18n( $versana_projects_count ) )
                    );
                    ?>
                </li>
                <li>
                    <?php
                    echo esc_html( sprintf(
                        /* translators: %s: Storage amount (e.g. 10 GB) */
                        __( '%s Storage', 'versana-companion' ),
                        '10 GB'
                    ) );
                    ?>
                </li>
                <li><?php echo esc_html__( 'Email Support', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'Basic Analytics', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'SSL Certificate', 'versana-companion' ); ?></li>
            </ul>
            <!-- /wp:list -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:6px"><?php echo esc_html__( 'Get Started', 'versana-companion' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}},"border":{"radius":"8px","width":"2px"}},"borderColor":"primary","backgroundColor":"neutral-100","className":"has-shadow-lg"} -->
        <div class="wp-block-column has-shadow-lg has-border-color has-primary-border-color has-neutral-100-background-color has-background" style="border-width:2px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
            
            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}},"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"backgroundColor":"primary","textColor":"neutral-100","fontSize":"xs","fontFamily":"system-sans"} -->
            <p class="has-text-align-center has-neutral-100-color has-primary-background-color has-text-color has-background has-link-color has-system-sans-font-family has-xs-font-size" style="border-radius:4px;margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'MOST POPULAR', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html__( 'Professional', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'For growing businesses', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
                <p style="font-size:3rem;font-weight:700;line-height:1">
                    <?php 
                    $versana_price = 79;
                    // translators: %s: The localized price amount
                    $versana_price_format = __( '$%s', 'versana-companion' );
                    echo esc_html( sprintf( 
                        $versana_price_format, 
                        number_format_i18n( $versana_price ) 
                    ) ); 
                    ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">
                    <?php 
                    echo esc_html( sprintf( 
                        /* translators: %s: The time period (e.g., month, year) */
                        __( '/%s', 'versana-companion' ), 
                        __( 'month', 'versana-companion' ) 
                    ) ); 
                    ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-checkmark-list"} -->
            <ul class="is-style-checkmark-list" style="padding-left:0">
                <li><?php echo esc_html__( 'Unlimited Projects', 'versana-companion' ); ?></li>
                <li>
                    <?php
                    echo esc_html( sprintf(
                        /* translators: %s: Storage amount (e.g. 10 GB) */
                        __( '%s Storage', 'versana-companion' ),
                        '100 GB'
                    ) );
                    ?>
                </li>
                <li><?php echo esc_html__( 'Priority Support', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'Advanced Analytics', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'Custom Domain', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'API Access', 'versana-companion' ); ?></li>
            </ul>
            <!-- /wp:list -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:6px"><?php echo esc_html__( 'Get Started', 'versana-companion' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-300","className":"has-shadow-sm"} -->
        <div class="wp-block-column has-shadow-sm has-border-color has-neutral-300-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
            
            <!-- wp:heading {"level":3,"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html__( 'Enterprise', 'versana-companion' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-700"} -->
            <p class="has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'For large organizations', 'versana-companion' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
                <p style="font-size:3rem;font-weight:700;line-height:1">
                    <?php 
                    $versana_price = 199;
                    echo esc_html( sprintf( 
                        /* translators: %s: The localized price amount (e.g., 199) */
                        __( '$%s', 'versana-companion' ), 
                        number_format_i18n( $versana_price ) 
                    ) ); 
                    ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-700"} -->
                <p class="has-neutral-700-color has-text-color">
                    <?php 
                    echo esc_html( sprintf( 
                        /* translators: %s: The time period (e.g., month, year) */
                        __( '/%s', 'versana-companion' ), 
                        __( 'month', 'versana-companion' ) 
                    ) ); 
                    ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg)"/>
            <!-- /wp:separator -->

            <!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-checkmark-list"} -->
            <ul class="is-style-checkmark-list" style="padding-left:0">
                <li><?php echo esc_html__( 'Unlimited Everything', 'versana-companion' ); ?></li>
                <li>
                    <?php
                    echo esc_html( sprintf(
                        /* translators: %s: Storage amount (e.g. 1 TB) */
                        __( '%s Storage', 'versana-companion' ),
                        '1 TB'
                    ) );
                    ?>
                </li>
                <li>
                    <?php
                    echo esc_html( sprintf(
                        /* translators: %s: Availability (e.g. 24/7) */
                        __( '%s Phone Support', 'versana-companion' ),
                        '24/7'
                    ) );
                    ?>
                </li>
                <li><?php echo esc_html__( 'Custom Analytics', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'White Label', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'Dedicated Manager', 'versana-companion' ); ?></li>
                <li><?php echo esc_html__( 'SLA Guarantee', 'versana-companion' ); ?></li>
            </ul>
            <!-- /wp:list -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:button {"width":100,"style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:6px"><?php echo esc_html__( 'Contact Sales', 'versana-companion' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->