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
                'instructions' => __('For example, Valid for 4 years. Leave empty when not applicable.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'duration',
                'type' => 'text',
                'label' => __('Duration', 'one-courses'),
                'instructions' => __('For example, 2 days or 4 hours.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'difficulty',
                'type' => 'text',
                'label' => __('Difficulty', 'one-courses'),
                'instructions' => __('For example, Basic or Advanced. Leave empty when not applicable.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'price',
                'type' => 'text',
                'label' => __('Price', 'one-courses'),
                'instructions' => __('Use display text such as £547.00, From £55.00 or Free.', 'one-courses'),
                'allow_in_bindings' => true,
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(CoursePostType::POST_TYPE);
    }
}
