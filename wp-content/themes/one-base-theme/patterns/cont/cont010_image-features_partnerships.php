<?php
/**
 * Title: Image and text — partnerships
 * Slug: one-202x/cont010_image-features_partnerships
 * Categories: a2e
 * Description: Image and text — partnerships. Editable section variant used by the A2E page layouts.
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
            <p class="is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Proven expertise. Lasting partnerships.', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We have a proven track record of working with a diverse range of clients in providing services and programmes that exceed nationally accepted standards and achieve the specific needs of service users and the unique environments in which they work.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We produce a bi annual newsletter with details of developments in medical emergencies and resuscitation practice in the UK and Europe. We also undertake a direct mailing to relevant organisations and groups quarterly. A significant proportion of our business is repeat and also through satisfied customer recommendations and referrals.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
<!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
<div class="wp-block-group a2e-button-group">
<!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","backgroundColor":"accent","textColor":"base","text":<?php echo wp_json_encode(__('Subscribe', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
<!-- /wp:one-202x/icon-button -->
<!-- wp:one-202x/icon-button {"url":<?php echo wp_json_encode(home_url('/contact-us/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"is-style-outline a2e-button","showIcon":false,"iconPosition":"right","textColor":"accent","borderColor":"accent","style":{"color":{"background":"transparent"}},"text":<?php echo wp_json_encode(__('Contact us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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
