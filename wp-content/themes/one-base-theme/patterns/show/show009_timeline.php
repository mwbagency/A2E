<?php
/**
 * Title: Timeline — year tabs
 * Slug: one-202x/show009_timeline
 * Categories: a2e
 * Description: Editable year tabs with text and media for each milestone. Add or reorder years using the Tabs block controls.
 * Keywords: timeline, history, years, tabs, milestones
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
$years = ['2013', '2014', '2015', '2016', '2017'];
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
                <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.', 'one-base-theme'); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:group {"className":"a2e-timeline__description","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-timeline__description">
                    <?php for ($paragraph = 0; $paragraph < 2; $paragraph++) : ?>
                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id. Enim risus id vulputate montes morbi vestibulum massa facilisis ipsum. Semper id sit facilisi faucibus nunc dictum. Dignissim mattis sit pellentesque ac nunc nunc penatibus pellentesque. Nibh.', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <?php endfor; ?>
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
