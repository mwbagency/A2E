<?php
/**
 * Title: Quote — featured
 * Slug: one-202x/cont005_quote
 * Categories: one-202x, one-202x-cont
 * Description: One large quotation with a circular portrait, name and job description.
 * Keywords: cont005_quote, testimonial, quotation
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-cont005_quote","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-cont005_quote">
<!-- wp:one-202x/quote {"quote":<?php echo wp_json_encode(__('Write a quotation that shares a real experience in the speaker’s own words.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"personName":<?php echo wp_json_encode(__('Person’s name', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"jobDescription":<?php echo wp_json_encode(__('Job title, organisation', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"imageUrl":<?php echo wp_json_encode(get_theme_file_uri('assets/images/placeholders/default-4x3.webp'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"is-style-featured"} /-->
</section>
<!-- /wp:group -->
