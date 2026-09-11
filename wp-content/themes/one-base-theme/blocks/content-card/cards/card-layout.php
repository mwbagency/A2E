<?php

defined('ABSPATH') || exit;

$post_id = absint($args['post_id'] ?? 0);
$attributes = $args['attributes'] ?? [];
$layout = $args['card_style'] ?? 'resource';
$title = (string) ($args['title'] ?? '');
$url = (string) ($args['url'] ?? '');
$image = (string) ($args['image'] ?? '');
$excerpt = (string) ($args['excerpt'] ?? '');
$heading_tag = 'h' . (int) ($args['heading_level'] ?? 3);
$number = trim((string) ($attributes['number'] ?? ''));
$label = trim((string) ($attributes['label'] ?? ''));
$duration = trim((string) ($attributes['duration'] ?? ''));
$detail = trim((string) ($attributes['detail'] ?? ''));
$price = trim((string) ($attributes['price'] ?? ''));
$price_note = trim((string) ($attributes['priceNote'] ?? ''));
$date = (string) ($args['published_date'] ?? '');
$datetime = (string) ($args['published_datetime'] ?? '');
$post_type = get_post_type($post_id);
$taxonomy = $post_type === 'post' ? 'category' : $post_type . '_category';
$terms = taxonomy_exists($taxonomy) ? get_the_terms($post_id, $taxonomy) : false;
if ($label === '' && is_array($terms)) {
    $label = $terms[0]->name;
}
$action = [];
$booking_url = '';
$action_url = $url;
$action_label = __('Read more', 'one-base-theme');

if ($post_type === 'course' && class_exists(\One202x\Courses\CourseValues::class)) {
    $values = (new \One202x\Courses\CourseValues())->all($post_id, [], ['source' => 'content_card']);
    $detail = $detail !== '' ? $detail : (string) ($values['certification_validity'] ?? '');
    $duration = $duration !== '' ? $duration : (string) ($values['duration'] ?? '');
    $price = $price !== '' ? $price : (string) ($values['price'] ?? '');
}

if ($post_type === 'event' && class_exists(\One202x\Events\EventValues::class)) {
    $values = (new \One202x\Events\EventValues())->all($post_id, [], ['source' => 'content_card']);
    $booking_url = trim((string) ($values['booking_url'] ?? ''));
    $price = $price !== '' ? $price : (string) ($values['price'] ?? '');
    $date = (string) ($values['start_date'] ?? $date);
    $datetime = (string) ($values['start_date_iso'] ?? $datetime);
    $detail = $detail !== '' ? $detail : (string) ($values['venue'] ?? '');
}
if ($post_type === 'service' && class_exists(\One202x\Services\ServiceValues::class)) {
    $values = (new \One202x\Services\ServiceValues())->all($post_id, [], ['source' => 'content_card']);
    $excerpt = (string) ($values['summary'] ?? $excerpt);
    $action = is_array($values['call_to_action'] ?? null) ? $values['call_to_action'] : [];
    $action_url = !empty($action['url']) ? $action['url'] : $url;
    $action_label = !empty($action['title']) ? $action['title'] : __('Learn more', 'one-base-theme');
}
if ($layout === 'product') {
    $action_label = __('View details', 'one-base-theme');
    $product = function_exists('wc_get_product') ? wc_get_product($post_id) : false;
    if ($product && $price === '') {
        $price = wp_strip_all_tags($product->get_price_html());
    }
} elseif ($layout === 'course') {
    $action_label = __('View result', 'one-base-theme');
    if ($label === '' && $post_type === 'event') {
        $label = __('Courses', 'one-base-theme');
    }
} elseif (in_array($layout, ['page-image', 'page-solid', 'programme'], true)) {
    $action_label = !empty($action['title']) ? $action['title'] : __('Learn more', 'one-base-theme');
}
if ($booking_url !== '') {
    $action_url = $booking_url;
    $action_label = __('Book this event', 'one-base-theme');
}
$action_target = ($action['target'] ?? '') === '_blank' ? '_blank' : '';
$show_image = $image !== '' && !in_array($layout, ['page-solid', 'course'], true);
$show_excerpt = !in_array($layout, ['page-image', 'resource', 'product', 'programme'], true);
$word_count = str_word_count(wp_strip_all_tags(strip_shortcodes((string) get_post_field('post_content', $post_id))));
$reading_minutes = max(1, (int) ceil($word_count / 200));
?>
<article <?php echo $args['wrapper_attributes']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php if ($show_image) : ?>
        <div class="one-202x-content-card__media"><?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
    <?php endif; ?>
    <div class="one-202x-content-card__content">
        <?php if ($number !== '') : ?><p class="one-202x-content-card__number"><?php echo esc_html($number); ?></p><?php endif; ?>
        <?php if (in_array($layout, ['resource', 'programme', 'course'], true) && ($label !== '' || $layout === 'resource')) : ?>
            <div class="one-202x-content-card__metadata">
                <?php if ($label !== '') : ?><span class="one-202x-content-card__tag"><?php echo esc_html($label); ?></span><?php endif; ?>
                <?php if ($layout === 'resource') : ?><span class="one-202x-content-card__reading-time"><?php
                    /* translators: %d: estimated reading time in minutes. */
                    printf(esc_html__('%d min. read', 'one-base-theme'), $reading_minutes);
                ?></span><?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($layout === 'product' && ($price !== '' || $detail !== '')) : ?>
            <div class="one-202x-content-card__product-price">
                <?php if ($price !== '') : ?><div class="one-202x-content-card__metadata"><span class="one-202x-content-card__tag one-202x-content-card__price"><?php echo esc_html($price); ?></span><span><?php echo esc_html($price_note); ?></span></div><?php endif; ?>
                <?php if ($detail !== '') : ?><p><?php echo esc_html($detail); ?></p><?php endif; ?>
            </div>
        <?php endif; ?>
        <<?php echo esc_attr($heading_tag); ?> class="one-202x-content-card__title">
            <?php if ($url !== '') : ?><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a><?php else : ?><?php echo esc_html($title); ?><?php endif; ?>
        </<?php echo esc_attr($heading_tag); ?>>
        <?php if ($show_excerpt && $excerpt !== '') : ?><div class="one-202x-content-card__summary"><?php echo wp_kses_post($excerpt); ?></div><?php endif; ?>
        <?php if ($layout === 'programme') : ?>
            <?php if ($detail !== '' || $duration !== '' || $price !== '') : ?>
                <div class="one-202x-content-card__metadata one-202x-content-card__programme-details">
                    <?php if ($detail !== '' || $duration !== '') : ?>
                        <div class="one-202x-content-card__programme-facts">
                            <?php if ($detail !== '') : ?><span><?php echo esc_html($detail); ?></span><?php endif; ?>
                            <?php if ($duration !== '') : ?><span><?php echo esc_html($duration); ?></span><?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($price !== '') : ?><span class="one-202x-content-card__tag one-202x-content-card__price"><?php echo esc_html($price); ?></span><?php endif; ?>
                </div>
            <?php endif; ?>
        <?php elseif ($layout !== 'page-image') : ?>
            <div class="one-202x-content-card__footer">
                <?php if ($layout === 'course' && $date !== '') : ?><time datetime="<?php echo esc_attr($datetime); ?>"><?php echo esc_html($date); ?></time><?php endif; ?>
                <?php if ($action_url !== '') : ?><a class="one-202x-content-card__link" href="<?php echo esc_url($action_url); ?>"<?php if ($action_target) : ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>><?php echo esc_html($action_label); ?><span class="screen-reader-text">: <?php echo esc_html($title); ?><?php if ($action_target) { esc_html_e(' (opens in a new tab)', 'one-base-theme'); } ?></span></a><?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
