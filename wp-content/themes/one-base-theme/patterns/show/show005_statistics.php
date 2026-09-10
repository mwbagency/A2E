<?php
/**
 * Title: Statistics — key figures
 * Slug: one-202x/show005_statistics
 * Categories: one-202x, one-202x-show
 * Description: Repeatable figures and supporting descriptions. Replace the sample values with verified results.
 * Keywords: show005_statistics, numbers, results, statistics
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
?>
<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-show005_statistics","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-show005_statistics">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('Our work in numbers', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showDescription":false,"showButton":false} /-->
<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group">
<?php foreach ([100, 50, 25] as $figure) : ?>
<!-- wp:group {"className":"is-style-card-light","style":{"spacing":{"padding":"var:preset|spacing|md"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card-light" style="padding:var(--wp--preset--spacing--md)">
<!-- wp:paragraph {"fontSize":"h-1"} -->
<p class="has-h-1-font-size"><?php echo esc_html(number_format_i18n($figure)); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><?php esc_html_e('Describe this verified result and the period it covers.', 'one-base-theme'); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
