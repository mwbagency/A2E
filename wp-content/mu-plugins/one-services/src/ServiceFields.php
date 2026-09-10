<?php

declare(strict_types=1);

namespace One202x\Services;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class ServiceFields extends FieldGroup
{
    public function id(): string
    {
        return 'service_details';
    }

    public function title(): string
    {
        return __('Service details', 'one-services');
    }

    public function fields(): array
    {
        return [
            [
                'id' => 'summary',
                'label' => __('Summary', 'one-services'),
                'type' => 'textarea',
                'instructions' => __('A concise description for service cards and listings.', 'one-services'),
                'rows' => 4,
                'new_lines' => '',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'featured',
                'label' => __('Featured', 'one-services'),
                'type' => 'true_false',
                'ui' => true,
                'default_value' => false,
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'call_to_action',
                'type' => 'link',
                'label' => __('Call to action', 'one-services'),
                'return_format' => 'array',
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(ServicePostType::POST_TYPE);
    }
}
