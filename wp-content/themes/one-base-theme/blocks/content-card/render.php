<?php

defined('ABSPATH') || exit;

// A saved ID overrides the enclosing Query Loop's post.
$post_id = absint($attributes['postId'] ?? 0);
$post_id = $post_id > 0 ? $post_id : absint($block->context['postId'] ?? 0);
$card_post = $post_id > 0 ? get_post($post_id) : null;

if (
    !$card_post instanceof WP_Post
    || $card_post->post_status !== 'publish'
) {
    return;
}

$post_type = get_post_type_object($card_post->post_type);
$is_viewable = $post_type instanceof WP_Post_Type && is_post_type_viewable($post_type);

if (
    !$post_type instanceof WP_Post_Type
    || (!$is_viewable && $post_type->name !== 'testimonial')
) {
    return;
}

$heading_level = (int) ($attributes['headingLevel'] ?? 3);
$heading_level = in_array($heading_level, array(2, 3, 4, 5, 6), true) ? $heading_level : 3;
$card_name = str_replace('_', '-', sanitize_key($card_post->post_type));
$card_style = sanitize_key($attributes['cardStyle'] ?? 'auto');
$card_styles = ['auto', 'resource', 'page-image', 'page-solid', 'programme', 'product', 'course', 'search', 'testimonial', 'testimonial-video'];
$card_style = in_array($card_style, $card_styles, true) ? $card_style : 'auto';
if ($card_style === 'auto') {
    $card_style = match ($card_name) {
        'page', 'service' => has_post_thumbnail($post_id) ? 'page-image' : 'page-solid',
        'event' => 'course',
        'course' => 'programme',
        'post' => 'resource',
        'product' => 'product',
        default => 'auto',
    };
}
$permalink = $is_viewable ? get_permalink($card_post) : '';
$title = trim(get_the_title($card_post));
$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => 'one-202x-content-card one-202x-content-card--' . $card_name . ' one-202x-content-card--layout-' . $card_style,
    )
);
$card_args = array(
    'title' => $title !== '' ? $title : __('Untitled', 'one-base-theme'),
    'heading_level' => $heading_level,
    'url' => is_string($permalink) ? $permalink : '',
    'wrapper_attributes' => $wrapper_attributes,
);

if ($card_post->post_password !== '') {
    if (!$is_viewable) {
        return;
    }

    get_template_part(
        'blocks/content-card/cards/card',
        'protected',
        $card_args
    );
    return;
}

get_template_part(
    'blocks/content-card/cards/card',
    in_array($card_style, ['testimonial', 'testimonial-video'], true) ? $card_style : ($card_style !== 'auto' ? 'layout' : $card_name),
    $card_args + array(
        'post_id' => $post_id,
        'card_style' => $card_style,
        'attributes' => $attributes,
        'image' => get_the_post_thumbnail(
            $card_post,
            'featured-card',
            array('class' => 'one-202x-content-card__image')
        ),
        'excerpt' => get_the_excerpt($card_post),
        'published_date' => get_the_date('', $card_post),
        'published_datetime' => get_the_date(DATE_W3C, $card_post),
    )
);
