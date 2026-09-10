<?php

defined('ABSPATH') || exit;

$defaults = [
    'rateLabel' => __('Standard rate', 'one-base-theme'),
    'price' => '',
    'priceNote' => __('inc. VAT', 'one-base-theme'),
    'badge' => '',
    'locationLabel' => __('Select training hub', 'one-base-theme'),
    'locationPlaceholder' => __('Choose a location…', 'one-base-theme'),
    'dateLabel' => __('Available dates', 'one-base-theme'),
    'datePlaceholder' => __('Select a date…', 'one-base-theme'),
    'buttonText' => __('Book online', 'one-base-theme'),
    'note' => __('Online booking will be available soon.', 'one-base-theme'),
];
$values = [];
foreach ($defaults as $key => $default) {
    $values[$key] = array_key_exists($key, $block->parsed_block['attrs'] ?? [])
        ? wp_strip_all_tags((string) ($attributes[$key] ?? ''))
        : $default;
}
$instance = wp_unique_id('one-202x-booking-');
?>
<div <?php echo get_block_wrapper_attributes(['class' => 'one-202x-booking-card']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="one-202x-booking-card__header">
        <div>
            <p class="one-202x-booking-card__rate"><?php echo esc_html($values['rateLabel']); ?></p>
            <?php if ($values['price'] !== '') : ?>
                <p class="one-202x-booking-card__pricing"><span class="one-202x-booking-card__price"><?php echo esc_html($values['price']); ?></span><span><?php echo esc_html($values['priceNote']); ?></span></p>
            <?php endif; ?>
        </div>
        <?php if ($values['badge'] !== '') : ?><span class="one-202x-booking-card__badge"><?php echo esc_html($values['badge']); ?></span><?php endif; ?>
    </div>
    <?php foreach (['location', 'date'] as $field) : ?>
        <div class="one-202x-booking-card__field">
            <label for="<?php echo esc_attr($instance . $field); ?>"><?php echo esc_html($values[$field . 'Label']); ?></label>
            <select id="<?php echo esc_attr($instance . $field); ?>" disabled aria-describedby="<?php echo esc_attr($instance . 'note'); ?>"><option><?php echo esc_html($values[$field . 'Placeholder']); ?></option></select>
        </div>
    <?php endforeach; ?>
    <button class="one-202x-booking-card__button" type="button" disabled aria-describedby="<?php echo esc_attr($instance . 'note'); ?>"><?php echo esc_html($values['buttonText']); ?></button>
    <p class="one-202x-booking-card__note" id="<?php echo esc_attr($instance . 'note'); ?>"><?php echo esc_html($values['note']); ?></p>
</div>
