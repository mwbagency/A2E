<?php

defined('ABSPATH') || exit;

$quote = wp_kses($attributes['quote'] ?? '', array('strong' => array(), 'em' => array(), 'br' => array()));
$person_name = wp_strip_all_tags($attributes['personName'] ?? '');
$job_description = wp_strip_all_tags($attributes['jobDescription'] ?? '');
$image_id = absint($attributes['imageId'] ?? 0);
$image_url = esc_url($attributes['imageUrl'] ?? '', array('http', 'https'));
$image = $image_id > 0 ? wp_get_attachment_image($image_id, 'medium', false, array(
    'class' => 'one-202x-quote__image',
    'alt' => '',
)) : '';
$has_quote = trim(wp_strip_all_tags($quote)) !== '';
$has_image = $image !== '' || $image_url !== '';
$has_attribution = $person_name !== '' || $job_description !== '';

if (!$has_quote && !$has_attribution && !$has_image) {
    return;
}
?>
<figure <?php echo get_block_wrapper_attributes(array('class' => 'one-202x-quote')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="one-202x-quote__body">
        <?php if ($image !== '') : ?>
            <?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Core attachment markup. ?>
        <?php elseif ($image_url !== '') : ?>
            <img class="one-202x-quote__image" src="<?php echo $image_url; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- esc_url above. ?>" alt="" width="101" height="41" loading="lazy" decoding="async" />
        <?php endif; ?>
        <?php if ($has_quote) : ?>
            <blockquote class="one-202x-quote__text"><p><?php echo $quote; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Restricted inline markup. ?></p></blockquote>
        <?php endif; ?>
    </div>
    <?php if ($has_attribution) : ?>
        <figcaption class="one-202x-quote__attribution">
            <div>
                <?php if ($person_name !== '') : ?><p class="one-202x-quote__name"><?php echo esc_html($person_name); ?></p><?php endif; ?>
                <?php if ($job_description !== '') : ?><p class="one-202x-quote__job"><?php echo esc_html($job_description); ?></p><?php endif; ?>
            </div>
        </figcaption>
    <?php endif; ?>
</figure>
