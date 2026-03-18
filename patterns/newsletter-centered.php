<?php
/**
 * Title: Newsletter Centered
 * Slug: versana/newsletter-centered
 * Categories: versana-patterns
 * Keywords: newsletter, subscribe, email, signup
 * Block Types: core/group
 * Description: Centered newsletter signup section with description.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained","contentSize":"700px"}} -->
<div class="wp-block-group alignfull has-neutral-200-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--md)">
    
    <!-- wp:heading {"textAlign":"center","fontSize":"4-xl"} -->
    <h2 class="wp-block-heading has-text-align-center has-4-xl-font-size"><?php echo esc_html__( 'Stay Updated', 'versana-companion' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|xl"}}},"fontSize":"lg"} -->
    <p class="has-text-align-center has-lg-font-size" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--xl)"><?php echo esc_html__( 'Subscribe to our newsletter for the latest updates, tips, and exclusive content delivered to your inbox.', 'versana-companion' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}},"border":{"radius":"8px"}},"backgroundColor":"neutral-100","className":"has-shadow-md","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-shadow-md has-neutral-100-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)">
        
        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"md"} -->
        <p class="has-text-align-center has-md-font-size" style="margin-bottom:var(--wp--preset--spacing--md)">
            <strong><span role="img" aria-label="email">📧</span> 
                <?php
                echo esc_html(
                    sprintf(
                        /* translators: %s: Number of subscribers */
                        __( 'Join %s subscribers', 'versana-companion' ),
                        '10,000+'
                    )
                );
                ?>
            </strong></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"textColor":"neutral-700"} -->
        <p class="has-text-align-center has-neutral-700-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'Add a newsletter plugin or form here. Popular options include Newsletter, Mailchimp for WordPress, or ConvertKit.', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|md","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|md"}},"border":{"radius":"6px","width":"1px"}},"borderColor":"neutral-300","backgroundColor":"neutral-100"} -->
            <p class="has-border-color has-neutral-300-border-color has-neutral-100-background-color has-background" style="border-width:1px;border-radius:6px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--md)">your@email.com</p>
            <!-- /wp:paragraph -->

            <!-- wp:button {"style":{"border":{"radius":"6px"}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:6px"><?php echo esc_html__( 'Subscribe', 'versana-companion' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:group -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"neutral-700","fontSize":"xs"} -->
        <p class="has-text-align-center has-neutral-700-color has-text-color has-xs-font-size" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'We respect your privacy. Unsubscribe at any time.', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->