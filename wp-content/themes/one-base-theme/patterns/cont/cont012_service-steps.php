<?php
/**
 * Title: Service — delivery steps
 * Slug: one-202x/cont012_service-steps
 * Categories: a2e
 * Description: Service — delivery steps. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:group {"tagName":"section","align":"full","className":"a2e-service-detail__steps","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull a2e-service-detail__steps">
    <!-- wp:heading {"fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('From learners to educators', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->
    <!-- wp:list {"ordered":true} -->
    <ol class="wp-block-list">
        <?php foreach ([__('The challenge', 'one-base-theme'), __('Our approach', 'one-base-theme'), __('The outcome', 'one-base-theme')] as $step) : ?>
        <!-- wp:list-item -->
        <li><strong><?php echo esc_html($step); ?></strong><br><?php esc_html_e('Semper id sit facilisi faucibus nunc dictum. Dignissim mattis sit pellentesque ac nunc nunc penatibus pellentesque. Nibh.', 'one-base-theme'); ?></li>
        <!-- /wp:list-item -->
        <?php endforeach; ?>
    </ol>
    <!-- /wp:list -->
</section>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
