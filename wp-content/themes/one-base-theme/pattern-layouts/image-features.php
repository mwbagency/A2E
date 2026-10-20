<?php
/** Shared Media & Text structure. Slots contain theme-rendered block markup. */
defined('ABSPATH') || exit;
$media_right = ($args['root_attributes']['mediaPosition'] ?? 'left') === 'right';
?>
<!-- wp:media-text <?php echo wp_json_encode($args['root_attributes']); ?> -->
<div class="<?php echo esc_attr($args['root_class']); ?>" style="<?php echo esc_attr($args['grid_style']); ?>"><?php
if (!$media_right) {
    echo $args['media']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by the theme preset.
}
?><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post($args['eyebrow']); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post($args['heading']); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <?php echo $args['details']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Theme-rendered editable blocks. ?>
    </div>
    <!-- /wp:group -->
</div><?php
if ($media_right) {
    echo $args['media']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by the theme preset.
}
?></div>
<!-- /wp:media-text -->
