<?php

declare(strict_types=1);

namespace One202x\Faqs;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class FaqFields extends FieldGroup
{
    public function id(): string
    {
        return 'faq_details';
    }

    public function title(): string
    {
        return __('FAQ details', 'one-faqs');
    }

    public function fields(): array
    {
        return [
            [
                'id' => 'answer',
                'label' => __('Answer', 'one-faqs'),
                'type' => 'textarea',
                'required' => true,
                'rows' => 5,
                'new_lines' => 'br',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'featured',
                'label' => __('Featured', 'one-faqs'),
                'type' => 'true_false',
                'ui' => true,
                'default_value' => false,
                'allow_in_bindings' => true,
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(FaqPostType::POST_TYPE);
    }

    public function settings(): array
    {
        return [
            'show_in_rest' => true,
        ];
    }
}
