<?php

declare(strict_types=1);

namespace One202x\Events;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class EventFields extends FieldGroup
{
    public function id(): string
    {
        return 'event_details';
    }

    public function title(): string
    {
        return __('Event details', 'one-events');
    }

    public function fields(): array
    {
        $dateTimeFormat = (string) get_option('date_format')
            . ' ' . (string) get_option('time_format');

        return [
            [
                'id' => 'start_date',
                'type' => 'date_time_picker',
                'label' => __('Start date and time', 'one-events'),
                'required' => true,
                'display_format' => $dateTimeFormat,
                'return_format' => $dateTimeFormat,
                'first_day' => (int) get_option('start_of_week'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'end_date',
                'type' => 'date_time_picker',
                'label' => __('End date and time', 'one-events'),
                'display_format' => $dateTimeFormat,
                'return_format' => $dateTimeFormat,
                'first_day' => (int) get_option('start_of_week'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'venue',
                'label' => __('Venue', 'one-events'),
                'type' => 'text',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'address',
                'label' => __('Address', 'one-events'),
                'type' => 'textarea',
                'rows' => 3,
                'new_lines' => 'br',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'booking_url',
                'type' => 'url',
                'label' => __('Booking URL', 'one-events'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'price',
                'label' => __('Price', 'one-events'),
                'type' => 'text',
                'instructions' => __('Use display text such as Free or a price in your local currency.', 'one-events'),
                'allow_in_bindings' => true,
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(EventPostType::POST_TYPE);
    }
}
