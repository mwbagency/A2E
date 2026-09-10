<?php

defined('ABSPATH') || exit;

if (trim($content) === '') {
    return;
}
$direction = ($attributes['direction'] ?? 'left') === 'right' ? 'right' : 'left';
$duration = min(120, max(10, (float) ($attributes['duration'] ?? 30)));
?>
<div <?php echo get_block_wrapper_attributes(array(
    'class' => 'one-202x-logo-marquee',
    'data-direction' => $direction,
    'style' => '--one-marquee-duration:' . $duration . 's',
)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="one-202x-logo-marquee__viewport">
        <div class="one-202x-logo-marquee__belt">
            <div class="one-202x-logo-marquee__track" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
                <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Rendered inner Gallery. ?>
            </div>
        </div>
    </div>
    <button type="button" class="one-202x-logo-marquee__toggle" hidden data-pause-label="<?php esc_attr_e('Pause logo movement', 'one-base-theme'); ?>" data-resume-label="<?php esc_attr_e('Resume logo movement', 'one-base-theme'); ?>"><?php esc_html_e('Pause logo movement', 'one-base-theme'); ?></button>
</div>
