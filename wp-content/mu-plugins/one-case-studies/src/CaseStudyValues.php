<?php

declare(strict_types=1);

namespace One202x\CaseStudies;

use One202x\Platform\Content\PostTypeValues;
use WP_Block;

final class CaseStudyValues extends PostTypeValues
{
    public const BINDING_SOURCE = 'one-case-studies/value';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register_binding']);
    }

    public function register_binding(): void
    {
        if (!function_exists('register_block_bindings_source')) {
            return;
        }

        register_block_bindings_source(
            self::BINDING_SOURCE,
            [
                'label' => __('Case Study value', 'one-case-studies'),
                'uses_context' => [
                    'postId',
                    'postType',
                ],
                'get_value_callback' => [$this, 'get_binding_value'],
            ]
        );
    }

    public function get_binding_value(
        array $sourceArgs,
        WP_Block $block,
        string $attributeName
    ): string|int|float|null {
        $postId = (int) ($block->context['postId'] ?? get_the_ID());

        if (
            $postId < 1
            || get_post_type($postId) !== CaseStudyPostType::POST_TYPE
        ) {
            return null;
        }

        $post = get_post($postId);

        // Match Core's post-meta binding access rules, including previews.
        if (
            (!is_post_publicly_viewable($post) && !current_user_can('read_post', $postId))
            || post_password_required($post)
        ) {
            return null;
        }

        $key = $sourceArgs['key'] ?? null;

        if (!is_string($key) || $key === '' || is_protected_meta($key, 'post')) {
            return null;
        }

        if (!function_exists('get_field_object')) {
            return null;
        }

        // Inspect the definition without loading a value that may be private.
        $field = get_field_object($key, $postId, false, false);

        if (is_array($field)) {
            if (
                empty($field['allow_in_bindings'])
                || !acf_field_type_supports($field['type'], 'bindings', true)
            ) {
                return null;
            }
        } else {
            /**
             * Explicitly expose computed values that have no ACF field.
             *
             * This cannot override an ACF field's binding access setting.
             *
             * @param string[] $keys Public computed value keys.
             * @param int $postId Current case study ID.
             */
            $allowedKeys = apply_filters('one202x/case_studies/binding_allowed_keys', [], $postId);

            if (!is_array($allowedKeys) || !in_array($key, $allowedKeys, true)) {
                return null;
            }
        }

        $overrides = isset($sourceArgs['overrides'])
            && is_array($sourceArgs['overrides'])
                ? $sourceArgs['overrides']
                : [];

        $value = $this->get(
            $key,
            $postId,
            $overrides,
            [
                'source' => 'block_binding',
                'attribute' => $attributeName,
            ]
        );

        if (is_bool($value)) {
            return $value ? 1 : 0;
        }

        return is_string($value) || is_int($value) || is_float($value)
            ? $value
            : null;
    }

    protected function postType(): string
    {
        return CaseStudyPostType::POST_TYPE;
    }

    protected function filterName(): string
    {
        return 'one202x/case_studies/values';
    }
}
