<?php

defined('ABSPATH') || exit;

$terms = isset($args['terms']) && is_array($args['terms'])
    ? $args['terms']
    : array();
$selected_term_ids = isset($args['selected_term_ids'])
    && is_array($args['selected_term_ids'])
        ? array_map('intval', $args['selected_term_ids'])
        : array();
$category_parameter = sanitize_key(
    (string) ($args['category_parameter'] ?? '')
);
$page_parameter = sanitize_key((string) ($args['page_parameter'] ?? ''));
$listing_id = (string) ($args['listing_id'] ?? '');
$content_label = (string) ($args['content_label'] ?? __('content', 'one-base-theme'));

if ($terms === array() || $category_parameter === '' || $listing_id === '') {
    return;
}

$is_rest_request = wp_is_serving_rest_request();
$request_values = $is_rest_request ? array() : wp_unslash($_GET); // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Preserves public GET state between listing forms.
$request_values = is_array($request_values) ? $request_values : array();
$form_action = ($is_rest_request ? '' : remove_query_arg(array_keys($request_values)))
    . '#'
    . rawurlencode($listing_id);
$clear_url = ($is_rest_request ? '' : remove_query_arg(
    array($category_parameter, $page_parameter)
)) . '#' . rawurlencode($listing_id);

// Preserve nested values and exact names used by language and filtering plugins.
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
<form
    class="one-202x-content-listing__filters"
    action="<?php echo esc_url($form_action); ?>"
    method="get"
>
    <fieldset>
        <legend class="screen-reader-text">
            <?php
            /* translators: %s: plural content type label, for example Events. */
            echo esc_html(sprintf(__('Filter %s', 'one-base-theme'), $content_label));
            ?>
        </legend>

        <ul class="one-202x-content-listing__filter-list">
            <?php foreach ($terms as $term) : ?>
                <?php if ($term instanceof WP_Term) : ?>
                    <li>
                        <label>
                            <input
                                type="checkbox"
                                name="<?php echo esc_attr($category_parameter); ?>[]"
                                value="<?php echo esc_attr((string) $term->term_id); ?>"
                                <?php checked(in_array($term->term_id, $selected_term_ids, true)); ?>
                            >
                            <span><?php echo esc_html($term->name); ?></span>
                        </label>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <div class="one-202x-content-listing__filter-actions">
            <button class="wp-element-button" type="submit">
                <?php esc_html_e('Apply filters', 'one-base-theme'); ?>
            </button>

            <?php if ($selected_term_ids !== array()) : ?>
                <a href="<?php echo esc_url($clear_url); ?>">
                    <?php esc_html_e('Clear filters', 'one-base-theme'); ?>
                </a>
            <?php endif; ?>
        </div>
    </fieldset>

    <?php foreach ($request_values as $request_name => $request_value) : ?>
        <?php
        $request_name = (string) $request_name;

        if (
            $request_name === ''
            || $request_name === $category_parameter
            || $request_name === $page_parameter
        ) {
            continue;
        }

        $hidden_fields($request_name, $request_value);
        ?>
    <?php endforeach; ?>
</form>
