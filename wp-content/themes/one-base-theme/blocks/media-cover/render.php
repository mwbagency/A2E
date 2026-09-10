<?php

defined('ABSPATH') || exit;

$media_type = ($attributes['mediaType'] ?? '') === 'video'
    ? 'video'
    : 'image';
$playback_mode = ($attributes['playbackMode'] ?? '') === 'autoplay'
    ? 'autoplay'
    : 'manual';
$is_video_card = in_array('is-style-video-card', explode(' ', (string) ($attributes['className'] ?? '')), true);
if ($is_video_card) {
    $playback_mode = 'manual';
}
$media_id = absint($attributes['mediaId'] ?? 0);
$media_url = isset($attributes['mediaUrl']) ? esc_url((string) $attributes['mediaUrl']) : '';
$poster_url = isset($attributes['posterUrl']) ? esc_url((string) $attributes['posterUrl']) : '';
$poster_id = absint($attributes['posterId'] ?? 0);
$attachment_url = $media_id > 0 ? wp_get_attachment_url($media_id) : false;
$poster_attachment_url = $poster_id > 0 ? wp_get_attachment_image_url($poster_id, 'full') : false;
$media_url = is_string($attachment_url) ? $attachment_url : $media_url;
$poster_url = is_string($poster_attachment_url) ? $poster_attachment_url : $poster_url;
$alt = (string) ($attributes['alt'] ?? '');
$saved_attributes = $block->parsed_block['attrs'] ?? array();

// Translate defaults without changing saved text.
if (!array_key_exists('videoLabel', $saved_attributes)) {
    $attributes['videoLabel'] = __('Background video', 'one-base-theme');
}

if (!array_key_exists('captionsLabel', $saved_attributes)) {
    $attributes['captionsLabel'] = __('Captions', 'one-base-theme');
}

if (!array_key_exists('captionsLanguage', $saved_attributes)) {
    $attributes['captionsLanguage'] = get_bloginfo('language');
}
$video_label = trim((string) ($attributes['videoLabel'] ?? ''));
$video_label = $video_label !== '' ? $video_label : __('Background video', 'one-base-theme');
$captions_url = isset($attributes['captionsUrl'])
    ? esc_url((string) $attributes['captionsUrl'])
    : '';
$captions_label = trim((string) ($attributes['captionsLabel'] ?? ''));
$captions_label = $captions_label !== '' ? $captions_label : __('Captions', 'one-base-theme');
$captions_language = isset($attributes['captionsLanguage'])
    ? sanitize_key((string) $attributes['captionsLanguage'])
    : 'en';
$captions_language = $captions_language !== '' ? $captions_language : 'en';
$overlay_color = isset($attributes['overlayColor'])
    ? sanitize_hex_color((string) $attributes['overlayColor'])
    : '#ffffff';
$overlay_color = $overlay_color ?: '#ffffff';
$overlay_opacity = min(100, max(0, (int) ($attributes['overlayOpacity'] ?? 60)));
$focal_point = isset($attributes['focalPoint']) && is_array($attributes['focalPoint'])
    ? $attributes['focalPoint']
    : array();
$focal_x = isset($focal_point['x']) && is_numeric($focal_point['x'])
    ? min(1, max(0, (float) $focal_point['x']))
    : 0.5;
$focal_y = isset($focal_point['y']) && is_numeric($focal_point['y'])
    ? min(1, max(0, (float) $focal_point['y']))
    : 0.5;
$custom_style = sprintf(
    '--one-202x-media-cover-focal-x:%1$s%%;--one-202x-media-cover-focal-y:%2$s%%;--one-202x-media-cover-overlay-color:%3$s;--one-202x-media-cover-overlay-opacity:%4$s;',
    esc_attr((string) round($focal_x * 100, 2)),
    esc_attr((string) round($focal_y * 100, 2)),
    esc_attr($overlay_color),
    esc_attr((string) ($overlay_opacity / 100))
);
$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => sprintf(
            'one-202x-media-cover has-%1$s%2$s',
            $media_type,
            $media_url !== '' ? ' has-media' : ' has-no-media'
        ),
        'data-one-202x-media-cover' => 'true',
        'data-playback-mode' => $media_type === 'video' ? $playback_mode : '',
        'style' => $custom_style,
    )
);
$video_id = wp_unique_id('one-202x-media-cover-video-');
$play_label = $playback_mode === 'autoplay'
    ? __('Play background video', 'one-base-theme')
    : __('Play video', 'one-base-theme');
$pause_label = $playback_mode === 'autoplay'
    ? __('Pause background video', 'one-base-theme')
    : __('Pause video', 'one-base-theme');

if ($media_type === 'video' && $media_url !== '' && !is_admin()) {
    wp_enqueue_script('one-202x-media-cover-view');
}
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php if ($media_url !== '') : ?>
        <div class="one-202x-media-cover__media">
            <?php if ($media_type === 'video') : ?>
                <video
                    id="<?php echo esc_attr($video_id); ?>"
                    class="one-202x-media-cover__video"
                    aria-label="<?php echo esc_attr($video_label); ?>"
                    data-one-202x-video="true"
                    data-playback-mode="<?php echo esc_attr($playback_mode); ?>"
                    playsinline
                    <?php if ($playback_mode === 'autoplay') : ?>
                        data-src="<?php echo esc_url($media_url); ?>"
                        data-force-muted="true"
                        loop
                        muted
                        preload="none"
                    <?php else : ?>
                        controls
                        preload="metadata"
                        src="<?php echo esc_url($media_url); ?>"
                    <?php endif; ?>
                    <?php if ($poster_url !== '') : ?>poster="<?php echo esc_url($poster_url); ?>"<?php endif; ?>
                >
                    <?php if ($playback_mode === 'manual' && $captions_url !== '') : ?>
                        <track
                            default
                            kind="captions"
                            label="<?php echo esc_attr($captions_label); ?>"
                            src="<?php echo esc_url($captions_url); ?>"
                            srclang="<?php echo esc_attr($captions_language); ?>"
                        >
                    <?php endif; ?>
                </video>
            <?php elseif ($media_id > 0 && wp_attachment_is_image($media_id)) : ?>
                <?php
                echo wp_get_attachment_image(
                    $media_id,
                    'full',
                    false,
                    array(
                        'alt' => $alt,
                        'class' => 'one-202x-media-cover__image',
                    )
                );
                ?>
            <?php else : ?>
                <img
                    class="one-202x-media-cover__image"
                    src="<?php echo esc_url($media_url); ?>"
                    alt="<?php echo esc_attr($alt); ?>"
                    decoding="async"
                >
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <span class="one-202x-media-cover__overlay" aria-hidden="true"></span>

    <div class="one-202x-media-cover__inner-container">
        <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </div>

    <?php if ($media_type === 'video' && $media_url !== '') : ?>
        <button
            type="button"
            class="one-202x-media-cover__video-control"
            aria-controls="<?php echo esc_attr($video_id); ?>"
            aria-label="<?php echo esc_attr($play_label); ?>"
            data-pause-label="<?php echo esc_attr($pause_label); ?>"
            data-play-label="<?php echo esc_attr($play_label); ?>"
            data-one-202x-video-control="true"
            hidden
        >
            <svg class="one-202x-media-cover__control-icon" data-control-icon="play" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M8 5.5v13l10-6.5z"></path>
            </svg>
            <svg class="one-202x-media-cover__control-icon" data-control-icon="pause" viewBox="0 0 24 24" aria-hidden="true" focusable="false" hidden>
                <path d="M7 5h4v14H7zm6 0h4v14h-4z"></path>
            </svg>
        </button>
    <?php endif; ?>
</div>
