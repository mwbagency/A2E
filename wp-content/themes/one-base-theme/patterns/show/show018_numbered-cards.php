<?php
/**
 * Title: Numbered cards — slider
 * Slug: one-202x/show018_numbered-cards
 * Categories: a2e
 * Description: A scrolling row of editable image and solid-colour cards. Duplicate or reorder cards in List View and edit their numbers, titles, images and links.
 * Keywords: numbered, cards, pages, links, slider, scroll
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"metadata":{"name":"Numbered cards — slider"},"tagName":"section","align":"full","className":"one-202x-pattern-show018_numbered-cards","backgroundColor":"base","textColor":"contrast","ariaLabel":<?php echo wp_json_encode(__('Numbered cards', 'one-base-theme')); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show018_numbered-cards has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Numbered cards', 'one-base-theme'); ?>">
    <!-- wp:group {"metadata":{"name":"Scrolling cards"},"className":"a2e-numbered-cards__track","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-numbered-cards__track">
        <?php for ($number = 1; $number <= 4; $number++) : $solid = $number === 2; ?>
        <!-- wp:group {"metadata":{"name":<?php echo wp_json_encode($solid ? __('Text card', 'one-base-theme') : __('Image card', 'one-base-theme')); ?>},"tagName":"article","className":"a2e-numbered-card<?php echo $solid ? ' a2e-numbered-card--solid' : ''; ?>","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card<?php echo $solid ? ' a2e-numbered-card--solid' : ''; ?>">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo esc_html(sprintf('%02d', $number)); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><?php esc_html_e('Title goes here', 'one-base-theme'); ?></h3>
                <!-- /wp:heading -->

                <?php if ($solid) : ?>
                <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
                <p class="a2e-numbered-card__description"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id. Enim risus id vulputate montes morbi vestibulum.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
                <?php endif; ?>
            </div>
            <!-- /wp:group -->

            <?php if ($solid) : ?>
            <!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme')); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
            <?php else : ?>
            <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure>
            <!-- /wp:image -->
            <?php endif; ?>
        </article>
        <!-- /wp:group -->
        <?php endfor; ?>
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
