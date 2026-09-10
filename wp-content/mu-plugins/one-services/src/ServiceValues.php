<?php

declare(strict_types=1);

namespace One202x\Services;

use One202x\Platform\Content\PostTypeValues;

final class ServiceValues extends PostTypeValues
{
    protected function postType(): string
    {
        return ServicePostType::POST_TYPE;
    }
}
