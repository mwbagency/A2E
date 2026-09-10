<?php

defined('ABSPATH') || exit;
if (!class_exists(\One202x\Events\EventValues::class)) { return []; }
$values = (new \One202x\Events\EventValues())->all($post_id, [], ['source' => 'post_details']);
$url = esc_url_raw((string) ($values['booking_url'] ?? ''));
return [
    ['label' => __('Starts', 'one-base-theme'), 'value' => $values['start_date'] ?? '', 'datetime' => $values['start_date_iso'] ?? ''],
    ['label' => __('Ends', 'one-base-theme'), 'value' => $values['end_date'] ?? '', 'datetime' => $values['end_date_iso'] ?? ''],
    ['label' => __('Venue', 'one-base-theme'), 'value' => $values['venue'] ?? ''],
    ['label' => __('Address', 'one-base-theme'), 'value' => $values['address'] ?? ''],
    ['label' => __('Price', 'one-base-theme'), 'value' => $values['price'] ?? ''],
    ['label' => __('Booking', 'one-base-theme'), 'value' => $url !== '' ? __('Book this event', 'one-base-theme') : '', 'url' => $url],
];
