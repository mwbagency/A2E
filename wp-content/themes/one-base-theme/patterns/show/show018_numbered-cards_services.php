<?php
/**
 * Title: Numbered cards — service pathways
 * Slug: one-202x/show018_numbered-cards_services
 * Categories: a2e
 * Description: Numbered cards — service pathways. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$pathways = [
    [__('Oliver McGowan Mandatory Training', 'one-base-theme'), 'oliver-mcgowan-mandatory-training'],
    [__('Resuscitation Training', 'one-base-theme'), 'resuscitation-training'],
    [__('Deteriorating Patient Training', 'one-base-theme'), 'deteriorating-patient-training'],
    [__('Instructor Training', 'one-base-theme'), 'instructor-training'],
    [__('Associated Training Programmes', 'one-base-theme'), 'associated-training-programmes'],
    [__('Governance & Consulting', 'one-base-theme'), 'governance-consulting'],
    [__('Online Training Programmes', 'one-base-theme'), 'online-training-programmes'],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page004_service","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page004_service">

<!-- wp:group {"metadata":{"name":"Numbered cards — slider"},"tagName":"section","align":"full","className":"one-202x-pattern-show018_numbered-cards","backgroundColor":"base","textColor":"contrast","ariaLabel":<?php echo wp_json_encode(__('Numbered cards', 'one-base-theme')); ?>,"layout":{"type":"default"},"anchor":"service-pathways"} -->
<section id="service-pathways" class="wp-block-group alignfull one-202x-pattern-show018_numbered-cards has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Numbered cards', 'one-base-theme'); ?>">
    <!-- wp:group {"metadata":{"name":"Scrolling cards"},"className":"a2e-numbered-cards__track","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-numbered-cards__track">
        <?php foreach ($pathways as $index => [$title, $slug]) :
            $term = get_term_by('slug', $slug, 'service_category');
            $url = $term ? get_term_link($term) : '';
            $url = is_wp_error($url) ? '' : $url;
        ?>
        <!-- wp:group {"metadata":{"name":<?php echo wp_json_encode(__('Page link', 'one-base-theme')); ?>},"tagName":"article","className":"a2e-numbered-card <?php echo $index === 1 ? 'a2e-numbered-card--solid' : 'a2e-numbered-card--reveal'; ?>","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card <?php echo $index === 1 ? 'a2e-numbered-card--solid' : 'a2e-numbered-card--reveal'; ?>">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo esc_html(sprintf('%02d', $index + 1)); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><?php if ($url) : ?><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a><?php else : ?><?php echo esc_html($title); ?><?php endif; ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
                <p class="a2e-numbered-card__description"><?php if ($index === 1) esc_html_e('RCUK-approved BLS, ILS and ALS pathways from Level 2 basic through to Level 4 advanced life support.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <?php if ($index !== 1) : ?>
            <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure>
            <!-- /wp:image -->
            <?php endif; ?>
            <!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme')); ?>,"url":<?php echo wp_json_encode($url, JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </article>
        <!-- /wp:group -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
