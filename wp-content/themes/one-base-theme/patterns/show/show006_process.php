<?php
/**
 * Title: Process — numbered steps
 * Slug: one-202x/show006_process
 * Categories: one-202x, one-202x-show
 * Description: An editable ordered list explaining how a service or project works. Add or remove steps as needed.
 * Keywords: show006_process, process, steps, how it works
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
$steps = [
    [__('Discover', 'one-base-theme'), __('We listen to your goals and agree what success looks like.', 'one-base-theme')],
    [__('Create', 'one-base-theme'), __('We develop the approach together, with clear opportunities for feedback.', 'one-base-theme')],
    [__('Deliver', 'one-base-theme'), __('We put the work into practice and help you take the next step.', 'one-base-theme')],
];
?>
<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-show006_process","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-show006_process">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('How we work', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showDescription":false,"showButton":false} /-->
<!-- wp:list {"ordered":true,"className":"one-202x-process"} -->
<ol class="wp-block-list one-202x-process">
<?php foreach ($steps as [$title, $description]) : ?>
<!-- wp:list-item -->
<li><strong><?php echo esc_html($title); ?></strong><br><?php echo esc_html($description); ?></li>
<!-- /wp:list-item -->
<?php endforeach; ?>
</ol>
<!-- /wp:list -->
</section>
<!-- /wp:group -->
