<?php

declare(strict_types=1);

namespace One202x\Platform\Acf;

final class Location
{
    public static function postTypes(string ...$postTypes): array
    {
        return self::any('post_type', $postTypes);
    }

    public static function optionsPage(string $slug): array
    {
        return self::any('options_page', [$slug]);
    }

    private static function any(string $parameter, array $values): array
    {
        return array_map(
            static fn(string $value): array => [
                [
                    'param' => $parameter,
                    'operator' => '==',
                    'value' => $value,
                ],
            ],
            $values
        );
    }
}
