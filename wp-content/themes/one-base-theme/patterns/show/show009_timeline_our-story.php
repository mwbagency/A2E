<?php
/**
 * Title: Timeline — our story
 * Slug: one-202x/show009_timeline_our-story
 * Categories: a2e
 * Description: Timeline — our story. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$years = ['2006', '2011', '2016', '2020', __('Now', 'one-base-theme')];
?>
<!-- wp:tabs {"align":"full","className":"one-202x-pattern-show009_timeline","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-tabs alignfull one-202x-pattern-show009_timeline has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:tab-list {"ariaLabel":<?php echo wp_json_encode(__('Timeline years', 'one-base-theme')); ?>} -->
    <div class="wp-block-tab-list" role="tablist" aria-label="<?php esc_attr_e('Timeline years', 'one-base-theme'); ?>">
        <?php foreach ($years as $year) : ?>
        <button type="button" role="tab"><?php echo esc_html($year); ?></button>
        <?php endforeach; ?>
    </div>
    <!-- /wp:tab-list -->

    <!-- wp:tab-panels -->
    <div class="wp-block-tab-panels">
        <?php foreach ($years as $year) : ?>
        <!-- wp:tab-panel {"label":"<?php echo esc_attr($year); ?>","layout":{"type":"default"}} -->
        <section class="wp-block-tab-panel" role="tabpanel" tabindex="0">
            <!-- wp:media-text {"mediaPosition":"right","mediaType":"image","verticalAlignment":"top"} -->
            <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-top"><div class="wp-block-media-text__content">
                <!-- wp:heading {"fontSize":"h-2"} -->
                <h2 class="wp-block-heading has-h-2-font-size"><?php echo esc_html($year === '2006' ? __('Founded by clinicians', 'one-base-theme') : sprintf(__('Milestone — %s', 'one-base-theme'), $year)); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:group {"className":"a2e-timeline__description","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-timeline__description">
                    <!-- wp:paragraph -->
                    <p><?php echo esc_html($year === '2006'
                        ? __('A to E Training & Solutions Ltd was founded in 2006 by three colleagues (a nurse, paramedic, and doctor) who were active in the health service and who saw a gap in the provision of emergency life support and medical emergencies training. This field is not regulated and it is clear that there was a wide range of providers in the market delivering training of various quality.', 'one-base-theme')
                        : __('Add the story and image for this milestone.', 'one-base-theme')); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
            <!-- /wp:media-text -->
        </section>
        <!-- /wp:tab-panel -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:tab-panels -->
</div>
<!-- /wp:tabs -->
