<?php
/**
 * Title: Locations — address cards
 * Slug: one-202x/cont004_locations
 * Categories: one-202x, one-202x-cont
 * Description: Editable location cards with addresses and contact details. Duplicate a card to add another location.
 * Keywords: cont004_locations, addresses, offices, contact
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-cont004_locations","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-cont004_locations">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('Where to find us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Our locations and contact details.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showButton":false} /-->
<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group">
<?php foreach (array(__('Main office', 'one-base-theme'), __('Regional office', 'one-base-theme')) as $location_title) : ?>
    <!-- wp:group {"className":"is-style-card-light","style":{"spacing":{"padding":"var:preset|spacing|md"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-card-light" style="padding:var(--wp--preset--spacing--md)">
        <!-- wp:heading {"level":3} -->
        <h3 class="wp-block-heading"><?php echo esc_html($location_title); ?></h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Street address', 'one-base-theme'); ?><br><?php esc_html_e('City, region and postal code', 'one-base-theme'); ?><br><?php esc_html_e('Country', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <p><a href="mailto:hello@example.com">hello@example.com</a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Add your telephone number and opening hours.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
