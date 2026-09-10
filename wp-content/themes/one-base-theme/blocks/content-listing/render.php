<?php

defined('ABSPATH') || exit;

$attribute_schema = $block->block_type->attributes ?? array();
$post_type_schema = $attribute_schema['postType'] ?? array();
$allowed_post_types = isset($post_type_schema['enum'])
    && is_array($post_type_schema['enum'])
        ? $post_type_schema['enum']
        : array();
$default_post_type = (string) ($post_type_schema['default'] ?? '');
$post_type = sanitize_key(
    (string) ($attributes['postType'] ?? $default_post_type)
);

if (
    !in_array($post_type, $allowed_post_types, true)
    || !post_type_exists($post_type)
) {
    return;
}

$limit = min(12, max(1, (int) ($attributes['limit'] ?? 6)));
$columns = (int) ($attributes['columns'] ?? 3);
$columns = in_array($columns, array(1, 2, 3, 4), true) ? $columns : 3;
$heading_level = (int) ($attributes['headingLevel'] ?? 3);
$heading_level = in_array($heading_level, array(2, 3, 4, 5, 6), true) ? $heading_level : 3;
$show_filters = ($attributes['showFilters'] ?? true) !== false;
$show_pagination = ($attributes['showPagination'] ?? true) !== false;
$category_taxonomy = $post_type . '_category';
$has_category_taxonomy = taxonomy_exists($category_taxonomy)
    && is_object_in_taxonomy($post_type, $category_taxonomy);
$anchor = trim((string) ($attributes['anchor'] ?? ''));
$instance_key = $anchor !== ''
    ? sanitize_key(sanitize_title($anchor))
    : sanitize_key(wp_unique_prefixed_id($post_type . '-'));

// Avoid normalized-anchor collisions while preserving existing ASCII filter URLs.
if ($anchor !== '' && $instance_key !== $anchor) {
    $instance_key .= '-' . substr(hash('sha256', $anchor), 0, 12);
}

$page_parameter = 'one_listing_' . $instance_key . '_page';
$category_parameter = 'one_listing_' . $instance_key . '_category';
$current_page = 1;
$selected_term_ids = array();
$is_rest_request = wp_is_serving_rest_request();

if (!$is_rest_request && $show_pagination && isset($_GET[$page_parameter]) && is_scalar($_GET[$page_parameter])) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only public listing state.
    $current_page = max(
        1,
        absint(wp_unslash($_GET[$page_parameter])) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    );
}

if (!$is_rest_request && $show_filters && $has_category_taxonomy && isset($_GET[$category_parameter])) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only public listing state.
    $requested_values = wp_unslash($_GET[$category_parameter]); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $requested_values = is_array($requested_values)
        ? $requested_values
        : array($requested_values);
    $requested_term_ids = array();

    foreach ($requested_values as $requested_value) {
        if (!is_scalar($requested_value)) {
            continue;
        }

        $requested_term_id = absint($requested_value);

        if ($requested_term_id > 0) {
            $requested_term_ids[] = $requested_term_id;
        }
        if (count($requested_term_ids) >= 100) {
            break;
        }
    }

    $requested_term_ids = array_values(array_unique($requested_term_ids));

    if ($requested_term_ids !== array()) {
        $valid_term_ids = get_terms(
            array(
                'taxonomy' => $category_taxonomy,
                'include' => $requested_term_ids,
                'hide_empty' => false,
                'fields' => 'ids',
            )
        );

        if (is_array($valid_term_ids)) {
            $selected_term_ids = array_map('intval', $valid_term_ids);
        }
    }
}

$query_args = array(
    'post_type' => $post_type,
    'post_status' => 'publish',
    'has_password' => false,
    'posts_per_page' => $limit,
    'paged' => $current_page,
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => true,
    'no_found_rows' => !$show_pagination,
);

if ($selected_term_ids !== array()) {
    $query_args['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required user-selected taxonomy filter.
        array(
            'taxonomy' => $category_taxonomy,
            'field' => 'term_id',
            'terms' => $selected_term_ids,
            'operator' => 'IN',
            'include_children' => true,
        ),
    );
}

/**
 * Filter a Content Listing query before it runs.
 *
 * @param array<string, mixed> $query_args WP_Query arguments.
 * @param string               $post_type  Selected post type.
 * @param array<string, mixed> $attributes Block attributes.
 */
$filtered_query_args = apply_filters(
    'one202x/content_listing/query_args',
    $query_args,
    $post_type,
    $attributes
);

if (is_array($filtered_query_args)) {
    $query_args = $filtered_query_args;
}

$query = new WP_Query($query_args);

// Recover stale pagination links to page one.
if ($current_page > 1 && $query->posts === array()) {
    $current_page = 1;
    $query_args['paged'] = 1;
    $query = new WP_Query($query_args);
}
update_post_thumbnail_cache($query);
$terms = array();

if ($show_filters && $has_category_taxonomy) {
    $found_terms = get_terms(
        array(
            'taxonomy' => $category_taxonomy,
            'hide_empty' => true,
            'pad_counts' => true,
            'orderby' => 'name',
            'order' => 'ASC',
        )
    );

    if (is_array($found_terms)) {
        $terms = $found_terms;
    }
}

$post_type_object = get_post_type_object($post_type);
$content_label = $post_type_object instanceof WP_Post_Type
    ? (string) $post_type_object->labels->name
    : __('content', 'one-base-theme');
$listing_id = $anchor !== ''
    ? $anchor
    : 'content-listing-' . $instance_key;
$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'id' => $listing_id,
        'class' => sprintf(
            'one-202x-content-listing one-202x-content-listing--%1$s one-202x-content-listing--columns-%2$d',
            str_replace('_', '-', $post_type),
            $columns
        ),
    )
);
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php
    if ($terms !== array()) {
        get_template_part(
            'blocks/content-listing/parts/filters',
            null,
            array(
                'terms' => $terms,
                'selected_term_ids' => $selected_term_ids,
                'category_parameter' => $category_parameter,
                'page_parameter' => $page_parameter,
                'listing_id' => $listing_id,
                'content_label' => $content_label,
            )
        );
    }
    ?>

    <?php if ($query->posts === array()) : ?>
        <p class="one-202x-content-listing__empty">
            <?php esc_html_e('No items are available.', 'one-base-theme'); ?>
        </p>
    <?php else : ?>
        <div class="one-202x-content-listing__grid">
            <?php
            foreach ($query->posts as $post) {
                if (!$post instanceof WP_Post) {
                    continue;
                }

                echo render_block( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block renderer escapes the card.
                    array(
                        'blockName' => 'one-202x/content-card',
                        'attrs' => array(
                            'postId' => (int) $post->ID,
                            'headingLevel' => $heading_level,
                        ),
                        'innerBlocks' => array(),
                        'innerHTML' => '',
                        'innerContent' => array(),
                    )
                );
            }
            ?>
        </div>
    <?php endif; ?>

    <?php
    if ($show_pagination) {
        get_template_part(
            'blocks/content-listing/parts/pagination',
            null,
            array(
                'query' => $query,
                'current_page' => $current_page,
                'page_parameter' => $page_parameter,
                'listing_id' => $listing_id,
                'content_label' => $content_label,
            )
        );
    }
    ?>
</div>
