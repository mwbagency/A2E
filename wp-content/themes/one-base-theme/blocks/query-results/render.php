<?php

use One202x\Theme\QueryFilters;

defined('ABSPATH') || exit;

$config = $block->context['query'][QueryFilters::CONTEXT_KEY] ?? null;
if (!$config) {
    return;
}
$page = QueryFilters::requested_page($config['page_parameter']);
$query = new WP_Query(build_query_vars_from_query_block($block, $page));
$shown = $query->post_count;
$total = (int) $query->found_posts;
$id = wp_unique_prefixed_id('a2e-query-results-');
$wrapper = ['id' => $id, 'class' => 'a2e-query-results'];
if (!empty($block->context['enhancedPagination'])) {
    $wrapper['data-wp-interactive'] = 'one-202x/query-filters';
    $wrapper['data-wp-on--click'] = 'actions.navigate';
}
$more_url = add_query_arg($config['page_parameter'], $page + 1) . '#' . $id;
?>
<div <?php echo get_block_wrapper_attributes($wrapper); ?>>
    <span class="a2e-query-results__loading" aria-hidden="true"></span>
    <?php if ($shown < $total && $page < 100) : ?>
        <?php
        foreach ($block->parsed_block['innerBlocks'] ?? [] as $button) {
            if ($button['blockName'] !== 'one-202x/icon-button') {
                continue;
            }
            $button['attrs']['url'] = $more_url;
            $button['attrs']['linkTarget'] = '';
            $button['attrs']['className'] = trim(($button['attrs']['className'] ?? '') . ' a2e-query-results__more');
            $html = new WP_HTML_Tag_Processor(render_block($button));
            if ($html->next_tag('A')) {
                $html->set_attribute('data-query-more', true);
            }
            echo $html->get_updated_html();
            break;
        }
        ?>
    <?php elseif ($shown < $total) : ?>
        <p><?php esc_html_e('Refine the filters to see the remaining results.', 'one-base-theme'); ?></p>
    <?php endif; ?>
    <p role="status" tabindex="-1"><?php
        /* translators: 1: displayed count, 2: total count, 3: content label, e.g. courses. */
        printf(esc_html__('Showing %1$s of total %2$s %3$s.', 'one-base-theme'),
            esc_html(number_format_i18n($shown)), esc_html(number_format_i18n($total)), esc_html($attributes['itemLabel'] ?? __('results', 'one-base-theme')));
    ?></p>
</div>
