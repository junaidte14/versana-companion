<?php
/**
 * Title: Size Guide
 * Slug: versana/boutique-size-guide
 * Categories: versana-patterns
 * Keywords: size, guide, chart, measurements
 * Description: Size guide table with measurements
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-200-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--4-xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--4-xl);padding-left:var(--wp--preset--spacing--md)">
    
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
    <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--2-xl)">
        <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"italic","fontWeight":"300","letterSpacing":"0.03em"}},"fontFamily":"system-serif","fontSize":"4-xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-system-serif-font-family has-4-xl-font-size" style="font-style:italic;font-weight:300;letter-spacing:0.03em"><?php echo esc_html__( 'Size Guide', 'versana-companion' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"md"} -->
        <p class="has-text-align-center has-md-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Find your perfect fit with our detailed measurements', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl"}}},"backgroundColor":"neutral-100","layout":{"type":"constrained","contentSize":"900px"}} -->
    <div class="wp-block-group alignwide has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-right:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl);padding-left:var(--wp--preset--spacing--2-xl)">
        
        <!-- wp:table {"hasFixedLayout":true,"className":"is-style-stripes"} -->
        <figure class="wp-block-table is-style-stripes"><table class="has-fixed-layout"><thead><tr><th><?php echo esc_html__( 'Size', 'versana-companion' ); ?></th><th><?php echo esc_html__( 'US', 'versana-companion' ); ?></th><th><?php echo esc_html__( 'EU', 'versana-companion' ); ?></th><th><?php echo esc_html__( 'Bust (in)', 'versana-companion' ); ?></th><th><?php echo esc_html__( 'Waist (in)', 'versana-companion' ); ?></th><th><?php echo esc_html__( 'Hip (in)', 'versana-companion' ); ?></th></tr></thead><tbody><tr><td><?php echo esc_html__( 'XS', 'versana-companion' ); ?></td><td>0-2</td><td>32-34</td><td>31-32</td><td>24-25</td><td>33-34</td></tr><tr><td><?php echo esc_html__( 'S', 'versana-companion' ); ?></td><td>4-6</td><td>36-38</td><td>33-35</td><td>26-27</td><td>35-37</td></tr><tr><td><?php echo esc_html__( 'M', 'versana-companion' ); ?></td><td>8-10</td><td>40-42</td><td>36-38</td><td>28-30</td><td>38-40</td></tr><tr><td><?php echo esc_html__( 'L', 'versana-companion' ); ?></td><td>12-14</td><td>44-46</td><td>39-41</td><td>31-33</td><td>41-43</td></tr><tr><td><?php echo esc_html__( 'XL', 'versana-companion' ); ?></td><td>16-18</td><td>48-50</td><td>42-44</td><td>34-36</td><td>44-46</td></tr></tbody></table></figure>
        <!-- /wp:table -->

        <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-300","className":"is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl)"/>
        <!-- /wp:separator -->

        <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"400"}},"fontSize":"xl"} -->
        <h3 class="wp-block-heading has-xl-font-size" style="font-weight:400"><?php echo esc_html__( 'How to Measure', 'versana-companion' ); ?></h3>
        <!-- /wp:heading -->

        <!-- wp:list {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
        <ul style="margin-top:var(--wp--preset--spacing--md)">
            <li><?php echo esc_html__( '<strong>Bust:</strong> Measure around the fullest part of your bust', 'versana-companion' ); ?></li>
            <li><?php echo esc_html__( '<strong>Waist:</strong> Measure around the narrowest part of your waist', 'versana-companion' ); ?></li>
            <li><?php echo esc_html__( '<strong>Hip:</strong> Measure around the fullest part of your hips', 'versana-companion' ); ?></li>
        </ul>
        <!-- /wp:list -->

        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"textColor":"neutral-700","fontSize":"sm"} -->
        <p class="has-neutral-700-color has-text-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'Need help finding your size? Contact our customer service team for personalized assistance.', 'versana-companion' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->