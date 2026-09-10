<?php
/**
 * Title: Gallery — images
 * Slug: one-202x/show003_gallery
 * Categories: one-202x, one-202x-show
 * Description: An editable native Gallery with six image placeholders and the WordPress lightbox.
 * Keywords: show003_gallery, images, photos
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-show003_gallery","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-show003_gallery">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('In pictures', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Explore our work, places and people.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showButton":false} /-->
<!-- wp:gallery {"columns":3,"imageCrop":true,"linkTo":"none","sizeSlug":"full"} -->
<figure class="wp-block-gallery has-nested-images columns-3 is-cropped">
<?php for ($image_number = 0; $image_number < 6; ++$image_number) : ?>
    <!-- wp:image {"sizeSlug":"full","linkDestination":"none","lightbox":{"enabled":true}} -->
    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/default-4x3.webp')); ?>" alt="" /></figure>
    <!-- /wp:image -->
<?php endfor; ?>
</figure>
<!-- /wp:gallery -->
</section>
<!-- /wp:group -->
