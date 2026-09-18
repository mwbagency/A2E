<?php
/**
 * Title: Image and text — medical response
 * Slug: one-202x/cont010_image-features_medical-response
 * Categories: a2e
 * Description: Image and text — medical response. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base","metadata":{"name":"The first few moments after any medical incident are crucial"}} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post(__('About us', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('The first few moments after any medical incident are crucial', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"default"}} --><div class="wp-block-group"><!-- wp:paragraph --><p><?php echo wp_kses_post(__('We are clinician-led, we have lived experience and continue to practise. We know what it feels like to save a life, and we know the panic that can surround our clients when a situation occurs.', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('That’s why we don’t just prepare them to pass an exam – we prepare them for the life experiences they will go on to have in life support and resuscitation. We can intersperse our caregiver with facts which reassures them that we not only care – but we know. We are a safe and practised pair of hands that they can rely on.', 'one-base-theme')); ?></p><!-- /wp:paragraph --></div><!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"a2e-button-group"} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"yellow","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Read Our Story', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->
