<?php

defined('ABSPATH') || exit;

$query = $args['query'] ?? null;
$current_page = max(1, (int) ($args['current_page'] ?? 1));
$page_parameter = sanitize_key((string) ($args['page_parameter'] ?? ''));
$listing_id = (string) ($args['listing_id'] ?? '');
$content_label = (string) ($args['content_label'] ?? __('Content', 'one-base-theme'));

if (
    !$query instanceof WP_Query
    || $query->max_num_pages < 2
    || $page_parameter === ''
    || $listing_id === ''
) {
    return;
}

$placeholder = 999999999;
$base_url = remove_query_arg($page_parameter);
$pagination_base = str_replace(
    (string) $placeholder,
    '%#%',
    add_query_arg($page_parameter, $placeholder, $base_url)
);
$links = paginate_links(
    array(
        'base' => $pagination_base,
        'format' => '',
        'current' => min($current_page, (int) $query->max_num_pages),
        'total' => (int) $query->max_num_pages,
        'type' => 'list',
        'prev_text' => __('Previous', 'one-base-theme'),
        'next_text' => __('Next', 'one-base-theme'),
        'aria_current' => 'page',
        'add_fragment' => '#' . rawurlencode($listing_id),
    )
);

if (!is_string($links) || $links === '') {
    return;
}
?>
<nav
    class="one-202x-content-listing__pagination"
    aria-label="<?php
    /* translators: %s: plural content type label, for example Events. */
    echo esc_attr(sprintf(__('%s pagination', 'one-base-theme'), $content_label));
    ?>"
>
    <?php echo wp_kses_post($links); ?>
</nav>
