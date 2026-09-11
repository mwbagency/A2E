<?php
/**
 * Title: Logos — accreditation marquee
 * Slug: one-202x/ctas005_logo-marquee
 * Categories: a2e
 * Description: A full-width moving row of accreditation logos. Replace and reorder logos in the Gallery and adjust movement in the marquee settings.
 * Keywords: logos, marquee, accreditations, partners
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$logos = [
    ['qualsafe.png', __('Qualsafe registered centre', 'one-base-theme'), 58],
    ['ihpn.png', __('Independent Healthcare Providers Network', 'one-base-theme'), 128],
    ['skills-for-health.png', __('Skills for Health Quality Mark', 'one-base-theme'), 235],
];
?>
<!-- wp:one-202x/logo-marquee {"align":"full","className":"one-202x-pattern-ctas005_logo-marquee"} -->
    <!-- wp:gallery {"columns":3,"imageCrop":false,"linkTo":"none","sizeSlug":"full"} -->
    <figure class="wp-block-gallery has-nested-images columns-3">
        <?php foreach ($logos as [$file, $label, $width]) : ?>
        <!-- wp:image {"width":"<?php echo absint($width); ?>px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/accreditations/' . $file)); ?>" alt="<?php echo esc_attr($label); ?>" style="object-fit:contain;width:<?php echo absint($width); ?>px;height:56px"/></figure>
        <!-- /wp:image -->
        <?php endforeach; ?>
    </figure>
    <!-- /wp:gallery -->
<!-- /wp:one-202x/logo-marquee -->
