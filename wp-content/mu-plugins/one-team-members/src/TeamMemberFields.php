<?php

declare(strict_types=1);

namespace One202x\TeamMembers;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class TeamMemberFields extends FieldGroup
{
    public function id(): string
    {
        return 'team_member_details';
    }

    public function title(): string
    {
        return __('Team member details', 'one-team-members');
    }

    public function fields(): array
    {
        return [
            [
                'id' => 'job_title',
                'label' => __('Job Title', 'one-team-members'),
                'type' => 'text',
                'required' => true,
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'department',
                'label' => __('Department', 'one-team-members'),
                'type' => 'text',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'email',
                'label' => __('Email', 'one-team-members'),
                'type' => 'email',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'telephone',
                'label' => __('Telephone', 'one-team-members'),
                'type' => 'text',
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'linkedin_url',
                'type' => 'url',
                'label' => __('LinkedIn URL', 'one-team-members'),
                'allow_in_bindings' => true,
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(TeamMemberPostType::POST_TYPE);
    }
}
