<?php

use One202x\Theme\QueryFilters;

defined('ABSPATH') || exit;

$is_preview = wp_is_serving_rest_request();
$parent = $block->context['query'][QueryFilters::CONTEXT_KEY] ?? null;
$post_type = $is_preview ? sanitize_key((string) ($attributes['previewPostType'] ?? '')) : ($parent['post_type'] ?? '');
$source = QueryFilters::source($attributes, $post_type);
$config = $is_preview && $post_type !== ''
    ? QueryFilters::configuration($attributes, $post_type, $post_type, true)
    : ($parent['filters'][$source] ?? null);
if (!$config) {
    return;
}
$parameter = $config['parameter'];
$page_parameter = $parent['page_parameter'] ?? '';
$selected = $config['requested'];
$options = $config['options'];
$heading = trim((string) ($attributes['heading'] ?? ''));
$heading = $heading !== '' ? $heading : ($source === 'sort' ? __('Sort by', 'one-base-theme') : (QueryFilters::sources($post_type)[$source] ?? __('Categories', 'one-base-theme')));
$filter_id = trim((string) ($attributes['anchor'] ?? '')) ?: wp_unique_prefixed_id('one-202x-query-filters-');
$classes = explode(' ', (string) ($attributes['className'] ?? ''));
$is_tabs = in_array('is-style-a2e-category-tabs', $classes, true);
$is_buttons = in_array('is-style-a2e-filter-buttons', $classes, true);
$wrapper = ['id' => $filter_id, 'class' => 'one-202x-query-filters is-' . (($attributes['orientation'] ?? '') === 'vertical' ? 'vertical' : 'horizontal')];
if (!$is_preview && !empty($block->context['enhancedPagination'])) {
    $wrapper['data-wp-interactive'] = 'one-202x/query-filters';
    $wrapper['data-wp-on--click'] = 'actions.navigate';
    $wrapper['data-wp-on--submit'] = 'actions.navigate';
    if ($source === 'sort') {
        $wrapper['data-wp-on--change'] = 'actions.navigate';
    }
}
$wrapper_attributes = get_block_wrapper_attributes($wrapper);
$request_values = $is_preview ? [] : wp_unslash($_GET);
$clear_url = $is_preview ? '' : remove_query_arg([$parameter, $page_parameter]);
$clear_url .= '#' . rawurlencode($filter_id);
$action = ($is_preview ? '' : remove_query_arg(array_keys($request_values))) . '#' . rawurlencode($filter_id);

if ($is_tabs || $is_buttons) : ?>
    <nav <?php echo $wrapper_attributes; ?> aria-label="<?php echo esc_attr($heading); ?>">
        <?php if ($is_buttons) : ?><p class="one-202x-query-filters__heading"><?php echo esc_html($heading); ?></p><?php endif; ?>
        <ul class="one-202x-query-filters__options">
            <?php if ($is_tabs) : ?>
                <li><a data-filter-value="" href="<?php echo esc_url($clear_url); ?>" <?php if ($selected === []) : ?>aria-current="true"<?php endif; ?>><?php esc_html_e('All', 'one-base-theme'); ?></a></li>
            <?php endif; ?>
            <?php foreach ($options as $slug => $option) :
                $active = in_array((string) $slug, $selected, true);
                $next = $is_tabs ? [(string) $slug] : ($active ? array_diff($selected, [(string) $slug]) : [...$selected, (string) $slug]);
                $url = $next === [] ? $clear_url : add_query_arg($parameter, implode(',', $next), $clear_url);
                ?>
                <li><a data-filter-value="<?php echo esc_attr($slug); ?>" href="<?php echo esc_url($url); ?>" <?php if ($active) : ?>aria-current="true"<?php endif; ?>><?php echo esc_html($option['label']); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php if ($options === []) : ?><p class="one-202x-query-filters__empty"><?php esc_html_e('No options available yet.', 'one-base-theme'); ?></p><?php endif; ?>
    </nav>
<?php return; endif;

$hidden_fields = static function (string $name, mixed $value) use (&$hidden_fields): void {
    if (is_array($value)) {
        foreach ($value as $key => $nested) {
            $hidden_fields($name . '[' . $key . ']', $nested);
        }
    } elseif (is_scalar($value)) {
        printf('<input type="hidden" name="%s" value="%s">', esc_attr($name), esc_attr((string) $value));
    }
};
?>
<div <?php echo $wrapper_attributes; ?>>
    <form class="one-202x-query-filters__form" method="get" action="<?php echo esc_url($action); ?>" data-filter-parameter="<?php echo esc_attr($parameter); ?>">
        <?php if ($source === 'sort') : ?>
            <label class="one-202x-query-filters__heading" for="<?php echo esc_attr($filter_id . '-sort'); ?>"><?php echo esc_html($heading); ?></label>
            <select id="<?php echo esc_attr($filter_id . '-sort'); ?>" name="<?php echo esc_attr($parameter); ?>">
                <?php foreach ($options as $value => $option) : ?>
                    <option value="<?php echo esc_attr($value); ?>" <?php selected($selected[0] ?? 'newest', $value); ?>><?php echo esc_html($option['label']); ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!$is_preview && empty($block->context['enhancedPagination'])) : ?>
                <button type="submit"><?php esc_html_e('Sort results', 'one-base-theme'); ?></button>
            <?php else : ?>
                <noscript><button type="submit"><?php esc_html_e('Sort results', 'one-base-theme'); ?></button></noscript>
            <?php endif; ?>
        <?php else : ?>
            <fieldset>
                <legend class="one-202x-query-filters__heading"><?php echo esc_html($heading); ?></legend>
                <ul class="one-202x-query-filters__options">
                    <?php foreach ($options as $slug => $option) : ?>
                        <li><label><input type="checkbox" name="<?php echo esc_attr($parameter); ?>[]" value="<?php echo esc_attr($slug); ?>" <?php checked(in_array((string) $slug, $selected, true)); ?>><span><?php echo esc_html($option['label']); ?></span></label></li>
                    <?php endforeach; ?>
                </ul>
                <div class="one-202x-query-filters__actions">
                    <button type="submit" class="wp-element-button"><?php esc_html_e('Apply filters', 'one-base-theme'); ?></button>
                    <?php if ($selected !== []) : ?><a href="<?php echo esc_url($clear_url); ?>"><?php esc_html_e('Clear filters', 'one-base-theme'); ?></a><?php endif; ?>
                </div>
            </fieldset>
        <?php endif; ?>
        <?php foreach ($request_values as $name => $value) {
            if ((string) $name !== $parameter && (string) $name !== $page_parameter) {
                $hidden_fields((string) $name, $value);
            }
        } ?>
    </form>
</div>
