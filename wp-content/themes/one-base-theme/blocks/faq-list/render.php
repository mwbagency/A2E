<?php

use One202x\Faqs\FaqValues;

defined('ABSPATH') || exit;

// This block owns the list query and layout; the FAQ plugin supplies its fields.
$faqIds = is_array($attributes['faqIds'] ?? null)
    ? array_slice(array_unique(array_filter(array_map('absint', $attributes['faqIds']))), 0, 8)
    : [];
$columns = (int) ($attributes['columns'] ?? 1) === 2 ? 2 : 1;
$singleOpen = !isset($attributes['singleOpen']) || (bool) $attributes['singleOpen'];
$limit = min(8, max(1, (int) ($attributes['limit'] ?? 8)));
$categorySlug = sanitize_title($attributes['categorySlug'] ?? '');

$queryArguments = [
    'post_type' => 'faq',
    'post_status' => 'publish',
    'has_password' => false,
    'posts_per_page' => !empty($attributes['showAll']) ? -1 : $limit,
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => true,
    'no_found_rows' => true,
];

// Manual selection replaces the latest count and preserves the editor's order.
if ($faqIds !== []) {
    $queryArguments['post__in'] = $faqIds;
    $queryArguments['orderby'] = 'post__in';
    $queryArguments['order'] = 'ASC';
    $queryArguments['posts_per_page'] = count($faqIds);
} elseif ($categorySlug !== '') {
    // A missing category deliberately returns no FAQs, rather than another group's answers.
    $queryArguments['tax_query'] = [[
        'taxonomy' => 'faq_category',
        'field' => 'slug',
        'terms' => [$categorySlug],
    ]];
}

$faqPosts = post_type_exists('faq') ? (new WP_Query($queryArguments))->posts : [];
$values = class_exists(FaqValues::class) ? new FaqValues() : null;
$items = [];

foreach ($faqPosts as $faqPost) {
    if (!$faqPost instanceof WP_Post) {
        continue;
    }

    $title = get_the_title($faqPost->ID);
    $question = is_string($title) && $title !== ''
        ? $title
        : __('Untitled FAQ', 'one-base-theme');
    $answer = $values?->get('answer', $faqPost->ID, [], ['source' => 'accordion']);

    // Keep each accordion's escaped markup in the existing template part.
    ob_start();
    get_template_part('blocks/faq-list/parts/item', null, [
        'attributes' => 'class="one-faqs-faqs__item"',
        'question' => $question,
        'answer' => is_string($answer) ? $answer : '',
        'post_id' => $faqPost->ID,
    ]);
    $items[] = (string) ob_get_clean();
}

$wrapperOptions = [
    'class' => sprintf('one-faqs-faqs one-faqs-faqs--columns-%d', $columns),
    'data-one-faqs-single-open' => $singleOpen ? 'true' : 'false',
];

if (isset($attributes['anchor']) && is_string($attributes['anchor'])) {
    $wrapperOptions['id'] = $attributes['anchor'];
}

$wrapperAttributes = get_block_wrapper_attributes($wrapperOptions);

if ($items === []) {
    printf(
        '<div %1$s><p class="one-faqs-faqs__empty">%2$s</p></div>',
        $wrapperAttributes, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by WordPress.
        esc_html__('No FAQs are available.', 'one-base-theme')
    );
    return;
}

printf(
    '<div %1$s><div class="one-faqs-faqs__items">%2$s</div></div>',
    $wrapperAttributes, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by WordPress.
    implode('', $items) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in parts/item.php.
);
