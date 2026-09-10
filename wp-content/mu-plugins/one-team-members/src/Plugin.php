<?php

declare(strict_types=1);

namespace One202x\TeamMembers;

final class Plugin
{
    public function register_hooks(): void
    {
        (new TeamMemberPostType())->register_hooks();
        (new TeamMemberTaxonomy())->register_hooks();
        (new TeamMemberFields())->register_hooks();
    }
}
