<?php

declare(strict_types=1);

namespace One202x\Platform\Content;

abstract class PostTypeValues
{
    abstract protected function postType(): string;

    /**
     * Return every ACF value after applying overrides and feature logic.
     *
     * @param array<string, mixed> $overrides
     * @param array<string, mixed> $context
     * @return array<string, mixed>
     */
    final public function all(
        int $postId,
        array $overrides = [],
        array $context = []
    ): array {
        if (
            $postId < 1
            || get_post_type($postId) !== $this->postType()
            || !function_exists('get_fields')
        ) {
            return [];
        }

        $fields = get_fields($postId);
        $values = is_array($fields) ? $fields : [];

        $values = array_replace($values, $overrides);
        $values = $this->modify($values, $postId, $context);

        $filtered = apply_filters(
            $this->filterName(),
            $values,
            $postId,
            $context
        );

        return is_array($filtered) ? $filtered : $values;
    }

    /**
     * Return one stored, overridden or computed value.
     *
     * @param array<string, mixed> $overrides
     * @param array<string, mixed> $context
     */
    final public function get(
        string $key,
        int $postId,
        array $overrides = [],
        array $context = []
    ): mixed {
        $values = $this->all($postId, $overrides, $context);

        return array_key_exists($key, $values)
            ? $values[$key]
            : null;
    }

    /**
     * Override in the feature plugin to add computed or formatted values.
     *
     * @param array<string, mixed> $values
     * @param array<string, mixed> $context
     * @return array<string, mixed>
     */
    protected function modify(
        array $values,
        int $postId,
        array $context
    ): array {
        return $values;
    }

    protected function filterName(): string
    {
        return sprintf('one202x/%s/values', $this->postType());
    }
}
