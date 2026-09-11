<?php

defined('ABSPATH') || exit;

$post_id = (int) ($block->context['postId'] ?? 0);
if (!$post_id && defined('REST_REQUEST') && REST_REQUEST) {
    $post_id = (int) ($attributes['previewPostId'] ?? 0);
}
$shared_post = get_post($post_id);
if (!$post_id || !$shared_post || !is_post_publicly_viewable($shared_post)) return;

$url = get_permalink($shared_post);
$title = html_entity_decode(wp_strip_all_tags(get_the_title($shared_post)), ENT_QUOTES, get_bloginfo('charset'));
$links = [
    'linkedin' => ['label' => __('Share on LinkedIn', 'one-social-sharing'), 'url' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode($url)],
    'x' => ['label' => __('Share on X', 'one-social-sharing'), 'url' => 'https://x.com/intent/tweet?url=' . rawurlencode($url) . '&text=' . rawurlencode($title)],
    'facebook' => ['label' => __('Share on Facebook', 'one-social-sharing'), 'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($url)],
];
?>
<div <?php echo get_block_wrapper_attributes(['class' => 'one-social-sharing', 'role' => 'group', 'aria-label' => __('Share this article', 'one-social-sharing')]); ?>>
    <?php foreach ($links as $network => $link) : ?>
        <a class="one-social-sharing__control" href="<?php echo esc_url($link['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($link['label'] . ' ' . __('(opens in a new tab)', 'one-social-sharing')); ?>">
            <span class="one-social-sharing__icon one-social-sharing__icon--<?php echo esc_attr($network); ?>" aria-hidden="true"></span>
        </a>
    <?php endforeach; ?>
    <button class="one-social-sharing__control" type="button" data-share-copy="<?php echo esc_url($url); ?>" data-success="<?php esc_attr_e('Link copied', 'one-social-sharing'); ?>" data-error="<?php esc_attr_e('Select and copy the link below.', 'one-social-sharing'); ?>" aria-label="<?php esc_attr_e('Copy link', 'one-social-sharing'); ?>" hidden>
        <span class="one-social-sharing__icon one-social-sharing__icon--copy" aria-hidden="true"></span>
    </button>
    <span class="one-social-sharing__status" role="status"></span>
    <input class="one-social-sharing__fallback" type="text" readonly value="<?php echo esc_url($url); ?>" aria-label="<?php esc_attr_e('Article link to copy', 'one-social-sharing'); ?>" hidden>
</div>
