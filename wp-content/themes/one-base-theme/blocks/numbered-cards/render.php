<?php

defined('ABSPATH') || exit;

$label = trim(wp_strip_all_tags((string) ($attributes['label'] ?? '')));
$label = $label !== '' ? $label : __('Numbered cards', 'one-base-theme');
?>
<section <?php echo get_block_wrapper_attributes(['aria-label' => $label]); ?>>
    <div class="a2e-numbered-cards-block__track" tabindex="0" role="group" aria-label="<?php echo esc_attr($label); ?>">
        <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </div>
</section>
