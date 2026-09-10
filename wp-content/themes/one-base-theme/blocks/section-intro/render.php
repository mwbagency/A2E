<?php

defined('ABSPATH') || exit;

$alignment = ($attributes['alignment'] ?? '') === 'center'
    ? 'center'
    : 'left';
$title_level = (int) ($attributes['titleLevel'] ?? 2);
$title_level = in_array($title_level, [2, 3, 4, 5, 6], true)
    ? $title_level
    : 2;
$title_tag = 'h' . $title_level;
$subtitle = trim((string) ($attributes['subtitle'] ?? ''));
$title = trim((string) ($attributes['title'] ?? ''));
if (!array_key_exists('title', $block->parsed_block['attrs'] ?? array())) {
    $title = __('Section title', 'one-base-theme');
}
$description = trim((string) ($attributes['description'] ?? ''));
$show_subtitle = !array_key_exists('showSubtitle', $attributes)
    || (bool) $attributes['showSubtitle'];
$show_description = !array_key_exists('showDescription', $attributes)
    || (bool) $attributes['showDescription'];
$show_button = !array_key_exists('showButton', $attributes)
    || (bool) $attributes['showButton'];

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => sprintf(
            'one-202x-section-intro has-text-align-%s',
            $alignment
        ),
    ]
);
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php if ($show_subtitle && $subtitle !== '') : ?>
        <p class="one-202x-section-intro__subtitle is-style-eyebrow"><?php echo wp_kses($subtitle, array('br' => array())); ?></p>
    <?php endif; ?>

    <?php if ($title !== '') : ?>
        <?php
        printf(
            '<%1$s class="one-202x-section-intro__title">%2$s</%1$s>',
            esc_attr($title_tag),
            wp_kses($title, array('br' => array()))
        );
        ?>
    <?php endif; ?>

    <?php if ($show_description && $description !== '') : ?>
        <p class="one-202x-section-intro__description"><?php
        echo wp_kses(
            $description,
            array(
                'a' => array('href' => true, 'title' => true, 'rel' => true, 'target' => true),
                'br' => array(),
                'strong' => array(),
                'em' => array(),
                's' => array(),
                'code' => array(),
                'sub' => array(),
                'sup' => array(),
                'mark' => array('class' => true, 'style' => true),
                'span' => array('lang' => true, 'dir' => true, 'class' => true, 'style' => true),
            )
        );
        ?></p>
    <?php endif; ?>

    <?php if ($show_button && trim($content) !== '') : ?>
        <div class="one-202x-section-intro__actions">
            <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
    <?php endif; ?>
</div>
