<?php

declare(strict_types=1);

namespace One202x\Testimonials;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class TestimonialFields extends FieldGroup
{
    public function id(): string
    {
        return 'testimonial_details';
    }

    public function title(): string
    {
        return __('Testimonial details', 'one-testimonials');
    }

    public function fields(): array
    {
        return [
            [
                'id' => 'person_name',
                'label' => __('Person Name', 'one-testimonials'),
                'type' => 'text',
                'required' => true,
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'job_title',
                'label' => __('Job Title', 'one-testimonials'),
                'type' => 'text',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'organisation',
                'label' => __('Organisation', 'one-testimonials'),
                'type' => 'text',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'quote',
                'label' => __('Quote', 'one-testimonials'),
                'type' => 'textarea',
                'required' => true,
                'rows' => 5,
                'new_lines' => '',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'rating',
                'label' => __('Rating', 'one-testimonials'),
                'type' => 'select',
                'choices' => [
                    '1' => __('1 star', 'one-testimonials'),
                    '2' => __('2 stars', 'one-testimonials'),
                    '3' => __('3 stars', 'one-testimonials'),
                    '4' => __('4 stars', 'one-testimonials'),
                    '5' => __('5 stars', 'one-testimonials'),
                ],
                'default_value' => '5',
                'return_format' => 'value',
                'ui' => true,
                'allow_in_bindings' => true,
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(TestimonialPostType::POST_TYPE);
    }
}
