<?php

defined('ABSPATH') || exit;

$subtitle = (string) get_field('subtitle');
$title = (string) get_field('title');
$description = (string) get_field('description');
$image = get_field('image');

// Give the existing components their normal WordPress rendering context.
$render = static fn(string $name, array $attributes, string $html = ''): string => render_block([
    'blockName' => $name,
    'attrs' => $attributes,
    'innerBlocks' => [],
    'innerHTML' => $html,
    'innerContent' => [$html],
]);

$buttons = '';
foreach (get_field('buttons') ?: [] as $button) {
    $link = $button['link'] ?? [];
    if (empty($link['url']) || empty($link['title'])) {
        continue;
    }
    $icon = (string) ($button['icon'] ?? '');
    $buttons .= $render('one-202x/icon-button', [
        'text' => $link['title'],
        'url' => $link['url'],
        'linkTarget' => $link['target'] ?? '',
        'showIcon' => $icon !== '',
        'iconPosition' => 'right',
        'className' => ($button['style'] ?? '') === 'outline-dark' ? 'is-style-outline-dark' : 'is-style-fill',
    ], $icon !== '' ? $render('core/icon', ['icon' => $icon]) : '');
}

$has_image = is_array($image) && !empty($image['ID']);
$has_content = trim($subtitle . $title . strip_tags($description)) !== '' || $buttons !== '';
if (!$has_content && !$has_image) {
    if ($is_preview) {
        echo '<p>' . esc_html__('Add a title, text, buttons or an image in the block settings.', 'one-base-theme') . '</p>';
    }
    return;
}

// Gutenberg supplies this outer wrapper in ACF previews.
if (!$is_preview) : ?>
    <div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
<?php endif; ?>
<div class="a2e-heading-panel<?php echo $has_image && $has_content ? ' has-image' : ''; ?>">
    <?php
    if ($has_content) {
        echo $render('one-202x/section-intro', [
            'subtitle' => $subtitle,
            'title' => $title,
            'titleLevel' => (int) (get_field('title_level') ?: 2),
            'description' => $description,
        ], $buttons);
    }

    if ($has_image) {
        echo $render('one-202x/media-cover', [
            'mediaId' => (int) $image['ID'],
            'mediaType' => 'image',
            'alt' => (string) ($image['alt'] ?? ''),
            'overlayOpacity' => 0,
        ]);
    }
    ?>
</div>
<?php if (!$is_preview) : ?>
    </div>
<?php endif; ?>
