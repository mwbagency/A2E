<?php
/**
 * Title: Image and text — consultancy
 * Slug: one-202x/cont010_image-features_consultancy
 * Categories: a2e
 * Description: Image and text — consultancy. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page004_service","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page004_service">

<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Our Consultancy', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Expert support beyond clinical training', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We have a number of services outside of our courses that support both individuals and organisation. These include policy development, clinical simulation exercises and risk assessments.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We are always looking for new ways to better support and equip our clients so please get in touch if you have a bespoke need.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
<!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
<div class="wp-block-group a2e-button-group">
<!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","backgroundColor":"accent","textColor":"base","text":<?php echo wp_json_encode(__('Talk to Our Consultancy Team', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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

</div>
<!-- /wp:group -->
