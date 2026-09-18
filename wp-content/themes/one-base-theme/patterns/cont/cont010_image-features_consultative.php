<?php
/**
 * Title: Image and text — consultative approach
 * Slug: one-202x/cont010_image-features_consultative
 * Categories: a2e
 * Description: Image and text — consultative approach. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base","metadata":{"name":"A consultative and creative approach to every client"}} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post(__('Our courses', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('A consultative and creative approach to every client', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"default"}} --><div class="wp-block-group"><!-- wp:paragraph --><p><?php echo wp_kses_post(__('We know, from experience, that no two life support situations are the same – so why would your training be?', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('We take a consultative and creative approach; listening, understanding and challenging the preconceived parameters.', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('Creating an experience unique to you, in which your people can best learn, practise and demonstrate their skills.', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('Training programmes which befit the highest standard of front-line care.', 'one-base-theme')); ?></p><!-- /wp:paragraph --></div><!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"a2e-button-group"} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"yellow","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View our courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#courses"} -->
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
