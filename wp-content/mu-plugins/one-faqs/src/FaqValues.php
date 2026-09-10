<?php

declare(strict_types=1);

namespace One202x\Faqs;

use One202x\Platform\Content\PostTypeValues;

final class FaqValues extends PostTypeValues
{
    protected function postType(): string
    {
        return FaqPostType::POST_TYPE;
    }
}
