<?php

declare(strict_types=1);

namespace One202x\TeamMembers;

use One202x\Platform\Content\PostTypeValues;

final class TeamMemberValues extends PostTypeValues
{
    protected function postType(): string
    {
        return TeamMemberPostType::POST_TYPE;
    }
}
