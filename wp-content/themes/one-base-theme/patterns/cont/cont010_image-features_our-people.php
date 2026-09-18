<?php
/**
 * Title: Image and text — our people
 * Slug: one-202x/cont010_image-features_our-people
 * Categories: a2e
 * Description: Image and text — our people. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$people_features = [
    [__('Active clinical registration', 'one-base-theme'), __('GMC, NMC or HCPC verified and continuously monitored.', 'one-base-theme')],
    [__('Front-line acute care', 'one-base-theme'), __('Resuscitation Officers, A&E Doctors, ICU Nurses, Paramedics and Midwives.', 'one-base-theme')],
    [__('Internal quality auditing', 'one-base-theme'), __('Ongoing class reviews and CPD to maintain teaching standards.', 'one-base-theme')],
];
?>
<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('OUR PEOPLE', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Real People, Real Experience, Real Situations', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Every educator in our network of 350+ instructors brings real-world, front-line clinical experience. We onboard only clinicians who have lived the acute medical emergencies they teach,', 'one-base-theme'); ?> <strong><?php esc_html_e('bringing genuine credibility to every session.', 'one-base-theme'); ?></strong></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-image-features__list","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-image-features__list">
                <?php foreach ($people_features as [$title, $description]) : ?>
                <!-- wp:group {"className":"a2e-image-features__point","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-image-features__point">
                    <!-- wp:icon {"icon":"one-202x/a2e-vision","textColor":"base"} /-->
                    <!-- wp:group {"className":"a2e-image-features__point-text","layout":{"type":"default"}} -->
                    <div class="wp-block-group a2e-image-features__point-text">
                        <!-- wp:heading {"level":3,"fontSize":"body"} -->
                        <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <?php endforeach; ?>
            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->
