<?php

declare(strict_types=1);

namespace One202x\Courses;

final class Plugin
{
    public function register_hooks(): void
    {
        (new CoursePostType())->register_hooks();
        (new CourseTaxonomy())->register_hooks();
        (new CourseFields())->register_hooks();
    }
}
