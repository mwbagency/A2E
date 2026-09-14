<?php

defined('ABSPATH') || exit;

$post_id = absint($args['post_id'] ?? 0);
$values = class_exists(\One202x\Testimonials\TestimonialValues::class)
    ? (new \One202x\Testimonials\TestimonialValues())->all($post_id)
    : [];
$video_id = absint($values['video'] ?? 0);
if (empty($values['video_enabled']) || !$video_id || !wp_attachment_is('video', $video_id)) {
    return;
}
?>
<article <?php echo $args['wrapper_attributes']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php
    echo render_block([
        'blockName' => 'one-202x/media-cover',
        'attrs' => [
            'mediaId' => $video_id,
            'mediaType' => 'video',
            'posterId' => absint($values['video_poster'] ?? 0),
            'playbackMode' => 'manual',
            'videoLabel' => (string) ($args['title'] ?? ''),
            'className' => 'is-style-video-card',
            'overlayOpacity' => 0,
        ],
        'innerBlocks' => [],
        'innerHTML' => '',
        'innerContent' => [],
    ]); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Rendered theme block.
    ?>
</article>
