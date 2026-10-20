<?php

defined('ABSPATH') || exit;

$level = (int) ($attributes['titleLevel'] ?? 3);
$level = in_array($level, [2, 3, 4, 5, 6], true) ? $level : 3;
$number = trim(wp_strip_all_tags((string) ($attributes['number'] ?? '')));
$title = trim(wp_strip_all_tags((string) ($attributes['title'] ?? '')));
$description = trim((string) ($attributes['description'] ?? ''));
// An unfinished card still allows keyboard users to reveal its description.
$wrapper = str_contains($content, 'href=') ? [] : ['tabindex' => '0'];
?>
<article <?php echo get_block_wrapper_attributes($wrapper); ?>>
    <header class="a2e-numbered-card-block__heading">
        <?php if ($number !== '') : ?>
            <p class="a2e-numbered-card-block__number"><?php echo esc_html($number); ?></p>
        <?php endif; ?>
        <?php if ($title !== '') : ?>
            <?php printf('<h%1$d class="a2e-numbered-card-block__title">%2$s</h%1$d>', $level, esc_html($title)); ?>
        <?php endif; ?>
    </header>
    <div class="a2e-numbered-card-block__body">
        <?php if ($description !== '') : ?>
            <p class="a2e-numbered-card-block__description"><?php echo wp_kses($description, ['strong' => [], 'em' => [], 'br' => []]); ?></p>
        <?php endif; ?>
        <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </div>
</article>
