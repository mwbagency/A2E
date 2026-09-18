<?php
/**
 * Title: Image and text — national coverage
 * Slug: one-202x/cont010_image-features_national-coverage
 * Categories: a2e
 * Description: Image and text — national coverage. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:media-text {"align":"full","mediaType":"image","mediaPosition":"right","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast","metadata":{"name":"Training delivered across the UK"}} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:auto 58%"><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post(__('National coverage', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Training delivered across the UK', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('We train within client environments nationwide — NHS Trusts, private hospitals, universities and GP practices — as well as at our own dedicated training centres in North London (Archway) and West Midlands (Dudley). Over 200 active client sites and counting.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"a2e-button-group"} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"accent","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View Training Centres', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->
