<?php
/**
 * Title: Image and text — clinical expertise
 * Slug: one-202x/cont010_image-features_clinical-expertise
 * Categories: a2e
 * Description: Image and text — clinical expertise. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page004_service","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page004_service">

<!-- wp:media-text {"align":"full","mediaType":"image","mediaPosition":"right","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:auto 58%"><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Over 100 years of clinical expertise', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('A to E Training and Solutions Ltd has been operating in the specialist field of resuscitation education, governance, and infrastructure, providing high quality education and consultancy since 2006. Our team of expert clinicians, who are nationally accredited educators, has more than 100 years of experience of resuscitation service provision for the healthcare sector.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->

</div>
<!-- /wp:group -->
