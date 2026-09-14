<?php

declare(strict_types=1);

namespace One202x\TeamMembers;

final class TeamMemberPostType
{
    public const POST_TYPE = 'team_member';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_post_type(
            self::POST_TYPE,
            [
                'labels' => [
                    'name' => __('Team members', 'one-team-members'),
                    'singular_name' => __('Team member', 'one-team-members'),
                    'add_new_item' => __('Add team member', 'one-team-members'),
                    'edit_item' => __('Edit team member', 'one-team-members'),
                ],
                'public' => true,
                'show_in_rest' => true,
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'team',
                ],
                'menu_icon' => 'dashicons-groups',
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail',
                    'custom-fields', // Required for ACF's REST-based editor saves.
                    'page-attributes',
                    'revisions',
                ],
            ]
        );
    }
}
