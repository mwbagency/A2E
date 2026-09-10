<?php

declare(strict_types=1);

namespace One202x\Testimonials;

use One202x\Platform\Content\PostTypeValues;

final class TestimonialValues extends PostTypeValues
{
    protected function postType(): string
    {
        return TestimonialPostType::POST_TYPE;
    }
}
