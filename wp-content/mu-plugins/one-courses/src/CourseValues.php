<?php

declare(strict_types=1);

namespace One202x\Courses;

use One202x\Platform\Content\PostTypeValues;

final class CourseValues extends PostTypeValues
{
    protected function postType(): string
    {
        return CoursePostType::POST_TYPE;
    }

    protected function modify(array $values, int $postId, array $context): array
    {
        $values['difficulty'] = CourseTaxonomy::difficulty($postId);
        return $values;
    }
}
