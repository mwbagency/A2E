<?php

defined('ABSPATH') || exit;

$post_id = absint($block->context['postId'] ?? 0);
// Preview the editor's current post without saving its ID into the template.
if (wp_is_serving_rest_request() && !$post_id) {
    $post_id = absint($attributes['previewPostId'] ?? 0);
}
$details_post = get_post($post_id);
if (
    !$post_id || !$details_post instanceof WP_Post
    || (!is_post_publicly_viewable($details_post) && !current_user_can('read_post', $post_id))
    || post_password_required($details_post)
) {
    return;
}

$view = get_theme_file_path('blocks/post-details/views/' . str_replace('_', '-', $details_post->post_type) . '.php');
if (!is_file($view)) { return; }
$rows = require $view;
if (!is_array($rows)) { return; }
$rows = array_filter($rows, static fn(array $row): bool => is_scalar($row['value'] ?? null) && trim((string) $row['value']) !== '');
if (!$rows) { return; }
?>
<dl <?php echo get_block_wrapper_attributes(); ?>>
    <?php foreach ($rows as $row) : ?>
        <div class="one-202x-post-details__row">
            <dt><?php echo esc_html($row['label']); ?></dt>
            <dd>
                <?php if (!empty($row['url']) && esc_url($row['url']) !== '') : ?>
                    <a href="<?php echo esc_url($row['url']); ?>"><bdi><?php echo esc_html($row['value']); ?></bdi></a>
                <?php elseif (!empty($row['datetime'])) : ?>
                    <time datetime="<?php echo esc_attr($row['datetime']); ?>"><?php echo esc_html($row['value']); ?></time>
                <?php else : ?>
                    <?php echo nl2br(esc_html(wp_strip_all_tags((string) $row['value']))); ?>
                <?php endif; ?>
            </dd>
        </div>
    <?php endforeach; ?>
</dl>
