<?php
/**
 * Title: Quotes — grid
 * Slug: one-202x/cont006_quotes
 * Categories: one-202x, one-202x-cont
 * Description: Three reusable quote cards. Duplicate a card to add more; the grid adapts to the available width.
 * Keywords: cont006_quotes, testimonials, quotation
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-cont006_quotes","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-cont006_quotes">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('What people say', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Hear from the people we work with.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showButton":false} /-->
<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group">
<?php for ($quote_number = 0; $quote_number < 3; ++$quote_number) : ?>
<!-- wp:one-202x/quote {"quote":<?php echo wp_json_encode(__('Write a quotation that shares a real experience in the speaker’s own words.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"personName":<?php echo wp_json_encode(__('Person’s name', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"jobDescription":<?php echo wp_json_encode(__('Job title, organisation', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"imageUrl":<?php echo wp_json_encode(get_theme_file_uri('assets/images/placeholders/default-4x3.webp'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} /-->
<?php endfor; ?>
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
