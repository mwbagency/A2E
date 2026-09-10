<?php

declare(strict_types=1);

namespace One202x\Events;

use DateTimeImmutable;
use One202x\Platform\Content\PostTypeValues;

final class EventValues extends PostTypeValues
{
    protected function postType(): string
    {
        return EventPostType::POST_TYPE;
    }

    protected function modify(array $values, int $postId, array $context): array
    {
        // Keep machine dates separate from ACF's localized display strings.
        foreach (['start_date', 'end_date'] as $key) {
            $raw = get_post_meta($postId, $key, true);
            $values[$key . '_iso'] = '';

            if (
                !is_string($raw)
                || !preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/D', $raw)
            ) {
                continue;
            }

            $date = DateTimeImmutable::createFromFormat(
                '!Y-m-d H:i:s',
                $raw,
                wp_timezone()
            );

            if ($date && $date->format('Y-m-d H:i:s') === $raw) {
                $values[$key . '_iso'] = $date->format(DATE_ATOM);
            }
        }

        return $values;
    }
}
