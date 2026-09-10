<?php
/**
 * Title: Logos — static row
 * Slug: one-202x/ctas001_logos
 * Categories: one-202x, one-202x-ctas
 * Description: A static line of logos that wraps on smaller screens. Replace and reorder images in the Gallery.
 * Keywords: ctas001_logos, partners, accreditations
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-ctas001_logos","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-ctas001_logos">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('Our partners', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('A selection of the organisations we work with.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showButton":false} /-->
<!-- wp:gallery {"columns":3,"imageCrop":false,"linkTo":"none","sizeSlug":"full"} -->
<figure class="wp-block-gallery has-nested-images columns-3">
<?php for ($image_number = 0; $image_number < 6; ++$image_number) : ?>
    <!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/brand/one-theme-lockup.png')); ?>" alt="<?php esc_attr_e('Example logo', 'one-base-theme'); ?>" /></figure>
    <!-- /wp:image -->
<?php endfor; ?>
</figure>
<!-- /wp:gallery -->
</section>
<!-- /wp:group -->
