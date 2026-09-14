<?php

declare(strict_types=1);

namespace One202x\Courses;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class CourseFields extends FieldGroup
{
    public function id(): string
    {
        return 'course_details';
    }

    public function title(): string
    {
        return __('Course details', 'one-courses');
    }

    public function fields(): array
    {
        return [
            [
                'id' => 'certification_validity',
                'type' => 'text',
                'label' => __('Certification validity', 'one-courses'),
                'instructions' => __('Exact text shown on course cards, for example Valid for 4 years. Select its Validation band in the sidebar.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'duration',
                'type' => 'text',
                'label' => __('Duration', 'one-courses'),
                'instructions' => __('Exact text shown on course cards, for example 2 days or 4 hours. Select its Duration band in the sidebar.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
            [
                // Retain the key used by saved course-hero bindings.
                'id' => 'difficulty',
                'type' => 'text',
                'label' => __('Difficulty', 'one-courses'),
                'instructions' => __('Selected from the Difficulty taxonomy in the sidebar.', 'one-courses'),
                'readonly' => true,
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'price',
                'type' => 'text',
                'label' => __('Price', 'one-courses'),
                'instructions' => __('Exact display price, such as £547.00, From £55.00 or Free. Select its Price band in the sidebar.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(CoursePostType::POST_TYPE);
    }
}
