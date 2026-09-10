<?php

defined('ABSPATH') || exit;

$text = trim((string) ($attributes['text'] ?? ''));
if (!array_key_exists('text', $block->parsed_block['attrs'] ?? array())) {
    $text = __('Learn more', 'one-base-theme');
}
$text = trim(wp_kses($text, array()));
$text = $text !== '' ? $text : __('Button', 'one-base-theme');

$url = isset($attributes['url']) ? sanitize_url(trim((string) $attributes['url'])) : '';
$target = ($attributes['linkTarget'] ?? '') === '_blank'
    ? '_blank'
    : '';
$icon_position = ($attributes['iconPosition'] ?? '') === 'right'
    ? 'right'
    : 'left';
$show_icon = !array_key_exists('showIcon', $attributes) || (bool) $attributes['showIcon'];

$rel_tokens = isset($attributes['rel'])
    ? preg_split('/\s+/', trim((string) $attributes['rel']))
    : array();
$rel_tokens = is_array($rel_tokens) ? $rel_tokens : array();
$rel_tokens = array_map(
    static fn(string $token): string => preg_replace('/[^a-zA-Z0-9_-]/', '', $token),
    $rel_tokens
);
$rel_tokens = array_unique(array_filter($rel_tokens));

if ($target === '_blank' && !in_array('noopener', $rel_tokens, true)) {
    $rel_tokens[] = 'noopener';
}

$rel = implode(' ', $rel_tokens);
$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => $show_icon ? 'has-icon-' . $icon_position : 'has-no-icon',
    )
);
$label = sprintf(
    '<span class="one-202x-icon-button__label">%s</span>',
    wp_kses($text, array())
);
$inner_html = ($show_icon ? $content : '') . $label;

if ($url === '') {
    printf('<span %1$s>%2$s</span>', $wrapper_attributes, $inner_html);
    return;
}

if ($target === '_blank') {
    $inner_html .= '<span class="screen-reader-text"> '
        . esc_html__('(opens in a new tab)', 'one-base-theme')
        . '</span>';
}

printf(
    '<a %1$s href="%2$s"%3$s%4$s>%5$s</a>',
    $wrapper_attributes,
    esc_url($url),
    $target !== '' ? ' target="' . esc_attr($target) . '"' : '',
    $rel !== '' ? ' rel="' . esc_attr($rel) . '"' : '',
    $inner_html
);
