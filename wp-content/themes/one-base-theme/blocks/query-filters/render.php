<?php

use One202x\Theme\QueryFilters;

defined('ABSPATH') || exit;

$is_rest_request = wp_is_serving_rest_request();
$preview_post_type = sanitize_key((string) ($attributes['previewPostType'] ?? ''));
$configuration = $block->context['query'][QueryFilters::CONTEXT_KEY] ?? null;

if ($is_rest_request && $preview_post_type !== '') {
    // SSR receives only query type/ID, never a target post ID or frontend GET state.
    // Ordinary REST content rendering retains its enclosing Query configuration.
    $query_id = (int) ($attributes['previewQueryId'] ?? 0);
    $configuration = [
        'taxonomy' => QueryFilters::taxonomy_for_post_type($preview_post_type),
        'parameter' => 'one-query-' . $query_id . '-terms',
        'page_parameter' => 'query-' . $query_id . '-page',
        'selected_terms' => [],
    ];
}

// An orphaned block or inherited Query must not display a nonfunctional form.
if (!is_array($configuration)) {
    return;
}

$taxonomy = (string) ($configuration['taxonomy'] ?? '');
$parameter = (string) ($configuration['parameter'] ?? '');
$page_parameter = (string) ($configuration['page_parameter'] ?? '');
$selected_terms = array_map('intval', $configuration['selected_terms'] ?? []);
$heading = trim((string) ($attributes['heading'] ?? ''));
$heading = $heading !== '' ? $heading : __('Categories', 'one-base-theme');
$orientation = ($attributes['orientation'] ?? '') === 'vertical' ? 'vertical' : 'horizontal';
$filter_id = trim((string) ($attributes['anchor'] ?? ''));
$filter_id = $filter_id !== '' ? $filter_id : wp_unique_prefixed_id('one-202x-query-filters-');
$wrapper_attributes = get_block_wrapper_attributes([
    'id' => $filter_id,
    'class' => 'one-202x-query-filters is-' . $orientation,
]);
$terms = $taxonomy !== ''
    ? get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC'])
    : [];
$terms = is_array($terms) ? $terms : [];
$request_values = $is_rest_request ? [] : wp_unslash($_GET); // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Preserves read-only public query state.
$form_action = $is_rest_request ? '' : remove_query_arg(array_keys($request_values));
$form_action .= '#' . rawurlencode($filter_id);
$clear_url = $is_rest_request ? '' : remove_query_arg([$parameter, $page_parameter]);
$clear_url .= '#' . rawurlencode($filter_id);

// Preserve nested GET values exactly, including another Query's page or filters.
$hidden_fields = static function (string $name, mixed $value) use (&$hidden_fields): void {
    if (is_array($value)) {
        foreach ($value as $key => $nested_value) {
            $hidden_fields($name . '[' . $key . ']', $nested_value);
        }
    } elseif (is_scalar($value)) {
        printf('<input type="hidden" name="%s" value="%s">', esc_attr($name), esc_attr((string) $value));
    }
};
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <form class="one-202x-query-filters__form" method="get" action="<?php echo esc_url($form_action); ?>">
        <fieldset>
            <legend class="one-202x-query-filters__heading"><?php echo esc_html($heading); ?></legend>

            <?php if ($terms === []) : ?>
                <p class="one-202x-query-filters__empty">
                    <?php esc_html_e('No categories available yet.', 'one-base-theme'); ?>
                </p>
            <?php else : ?>
                <ul class="one-202x-query-filters__options">
                    <?php foreach ($terms as $term) : ?>
                        <?php if ($term instanceof WP_Term) : ?>
                            <li>
                                <label>
                                    <input
                                        type="checkbox"
                                        name="<?php echo esc_attr($parameter); ?>[]"
                                        value="<?php echo esc_attr((string) $term->term_id); ?>"
                                        <?php checked(in_array($term->term_id, $selected_terms, true)); ?>
                                    >
                                    <span><?php echo esc_html($term->name); ?></span>
                                </label>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ($terms !== [] || $selected_terms !== []) : ?>
                <div class="one-202x-query-filters__actions">
                    <button type="submit" class="wp-element-button"><?php esc_html_e('Apply filters', 'one-base-theme'); ?></button>
                    <?php if ($selected_terms !== []) : ?>
                        <a href="<?php echo esc_url($clear_url); ?>"><?php esc_html_e('Clear filters', 'one-base-theme'); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </fieldset>

        <?php
        foreach ($request_values as $name => $value) {
            if ((string) $name !== $parameter && (string) $name !== $page_parameter) {
                $hidden_fields((string) $name, $value);
            }
        }
        ?>
    </form>
</div>
