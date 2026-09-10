<?php

declare(strict_types=1);

namespace One202x\Platform\Acf;

use InvalidArgumentException;

abstract class FieldGroup
{
    abstract public function id(): string;
    abstract public function title(): string;
    abstract public function fields(): array;
    abstract public function location(): array;

    public function settings(): array
    {
        return [];
    }

    final public function register_hooks(): void
    {
        add_action('acf/include_fields', [$this, 'register'], 10, 0);
    }

    final public function register(): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group($this->build());
    }

    final public function build(): array
    {
        $id = $this->validateId($this->id());
        $keys = [];

        return array_merge(
            $this->settings(),
            [
                'key' => 'group_one202x_' . $id,
                'title' => $this->title(),
                'fields' => $this->normaliseFields($this->fields(), $id, $keys),
                'location' => $this->location(),
            ]
        );
    }

    private function normaliseFields(array $fields, string $path, array &$keys): array
    {
        $normalised = [];
        $seen = [];
        $names = [];

        foreach ($fields as $field) {
            if (!is_array($field)) {
                throw new InvalidArgumentException(
                    sprintf('Field must be an array, %s given.', get_debug_type($field))
                );
            }
            $id = $this->validateId((string) ($field['id'] ?? ''));
            $type = $field['type'] ?? null;

            if (!is_string($type) || $type === '') {
                throw new InvalidArgumentException(
                    sprintf('Field type must be a non-empty string, %s given.', get_debug_type($type))
                );
            }

            if (isset($seen[$id])) {
                throw new InvalidArgumentException(
                    sprintf('Field ID "%s" is not unique in the field group.', $id)
                );
            }

            $seen[$id] = true;

            $name = $this->validateId(
                (string) ($field['name'] ?? $id)
            );

            if (isset($names[$name])) {
                throw new InvalidArgumentException(
                    sprintf('Field name "%s" is not unique at "%s".', $name, $path)
                );
            }

            $names[$name] = true;
            $key = 'field_one202x_' . $path . '_' . $id;

            if (isset($keys[$key])) {
                throw new InvalidArgumentException(
                    sprintf('Generated ACF key "%s" is not unique. Use distinct field IDs.', $key)
                );
            }

            $keys[$key] = true;

            $label = isset($field['label']) && is_string($field['label'])
                ? $field['label']
                : ucwords(str_replace('_', ' ', $id));

            $children = $field['fields'] ?? null;

            unset(
                $field['id'],
                $field['key'],
                $field['name'],
                $field['label'],
                $field['type'],
                $field['fields'],
            );

            $definition = array_merge(
                [
                    'key' => $key,
                    'name' => $name,
                    'label' => $label,
                    'type' => $type,
                ],
                $field
            );

            if ($children !== null) {
                if (!is_array($children)) {
                    throw new InvalidArgumentException(
                        sprintf('Field "fields" must be an array, %s given.', get_debug_type($children))
                    );
                }

                $definition['sub_fields'] = $this->normaliseFields(
                    $children,
                    $path . '_' . $id,
                    $keys
                );
            }

            $normalised[] = $definition;
        }

        return $normalised;
    }

    private function validateId(string $id): string
    {
        if (!preg_match('/^[a-z][a-z0-9_]*$/', $id)) {
            throw new InvalidArgumentException(
                "Invalid ACF ID '{$id}'. Use lowercase letters, numbers and underscores."
            );
        }

        return $id;
    }
}
