<?php
/**
 * Title: Learner support card
 * Slug: one-202x/cont008_support-card
 * Categories: a2e
 * Description: An editable sidebar contact card with supporting links. Set the destinations using each button's link control.
 * Keywords: support, sidebar, contact, card
 * Viewport Width: 416
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"className":"one-202x-pattern-cont008_support-card","layout":{"type":"default"}} -->
<div class="wp-block-group one-202x-pattern-cont008_support-card">
    <!-- wp:group {"className":"one-202x-support-card__contact","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-support-card__contact">
        <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
        <!-- wp:group {"className":"one-202x-support-card__copy","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-support-card__copy">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php esc_html_e('Looking for learner support?', 'one-base-theme'); ?></h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Access booking help, certificates, course guidance and frequently asked questions.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode(__('Contact A to E', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showIcon":false} /-->
    </div>
    <!-- /wp:group -->
    <!-- wp:group {"className":"one-202x-support-card__explore","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-support-card__explore">
        <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
        <p class="is-style-eyebrow"><?php esc_html_e('Explore more', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:group {"className":"one-202x-support-card__links","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-support-card__links">
        <?php foreach ([__('Knowledge Hub', 'one-base-theme'), __('Our Services', 'one-base-theme'), __('About Us', 'one-base-theme')] as $link_label) : ?>
            <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode($link_label, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"iconPosition":"right","className":"is-style-icon-link"} -->
                <!-- wp:icon {"icon":"one-202x/a2e-chevron-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        <?php endforeach; ?>
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
