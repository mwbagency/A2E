<?php

declare(strict_types=1);

namespace One202x\TeamMembers;

final class TeamMemberTaxonomy
{
    public const TAXONOMY = 'team_member_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [TeamMemberPostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Team member categories', 'one-team-members'),
                    'singular_name' => __('Team member category', 'one-team-members'),
                ],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => [
                    'slug' => 'team-member-category',
                    'with_front' => false,
                ],
            ]
        );
    }
}
