<?php

/**
 * Public markup for Icon Button. WordPress passes the saved button settings in
 * $attributes and the already-rendered core/icon child in $content.
 * Keeping rendering in PHP also lets blocks such as Query Results supply a
 * calculated destination while reusing the same button and optional icon.
 * block.json declares clientNavigation support because this markup needs no
 * frontend initialisation when WordPress replaces a filtered Query Loop.
 */
defined('ABSPATH') || exit;

// Keep the label plain text and provide translated text when it has not been set.
$text = trim((string) ($attributes['text'] ?? ''));
if (!array_key_exists('text', $block->parsed_block['attrs'] ?? array())) {
    $text = __('Learn more', 'one-base-theme');
}
$text = trim(wp_kses($text, array()));
$text = $text !== '' ? $text : __('Button', 'one-base-theme');

// Limit the output to the supported link target and icon positions.
$url = isset($attributes['url']) ? sanitize_url(trim((string) $attributes['url'])) : '';
$target = ($attributes['linkTarget'] ?? '') === '_blank'
    ? '_blank'
    : '';
$icon_position = ($attributes['iconPosition'] ?? '') === 'right'
    ? 'right'
    : 'left';
$show_icon = !array_key_exists('showIcon', $attributes) || (bool) $attributes['showIcon'];

// Preserve relationships such as nofollow/sponsored and ensure links opened in
// another tab cannot use window.opener to control the original page.
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
// Include WordPress's classes and editor-selected styles. The has-icon-* class
// lets CSS place the icon before/after the label without changing saved content.
$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => $show_icon ? 'has-icon-' . $icon_position : 'has-no-icon',
    )
);
$label = sprintf(
    '<span class="one-202x-icon-button__label">%s</span>',
    wp_kses($text, array())
);
// The Icon child is always saved, but its rendered SVG is omitted when hidden.
$inner_html = ($show_icon ? $content : '') . $label;

// An unfinished button remains visible without creating an empty or misleading link.
if ($url === '') {
    printf('<span %1$s>%2$s</span>', $wrapper_attributes, $inner_html);
    return;
}

// Tell screen-reader users about the new tab without adding visible label text.
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
