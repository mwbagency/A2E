<?php

declare(strict_types=1);

namespace One202x\Platform\Content;

/** Public business contact data. This class never registers presentation blocks. */
final class SiteContacts
{
    public const PAGE = 'one-site-contacts';
    public const STORAGE = 'one_site_contacts';

    public function register_hooks(): void
    {
        add_action('acf/init', [$this, 'register_page']);
    }

    public function register_page(): void
    {
        if (!function_exists('acf_add_options_page')) {
            return;
        }

        acf_add_options_page([
            'page_title' => __('Site contact details', 'one-202x-platform'),
            'menu_title' => __('Site contacts', 'one-202x-platform'),
            'menu_slug' => self::PAGE,
            'post_id' => $this->storage(),
            'capability' => apply_filters('one202x/site_contacts/capability', 'manage_options'),
            'icon_url' => 'dashicons-location',
            'redirect' => false,
            'autoload' => false,
        ]);
    }

    /** @return array{locations: array, phones: array, emails: array} */
    public function all(): array
    {
        $storage = $this->storage();
        $values = [];
        foreach (['locations', 'phones', 'emails'] as $key) {
            $values[$key] = function_exists('get_field') ? get_field($key, $storage) : [];
        }
        $values = apply_filters('one202x/site_contacts/values', $values, get_locale(), get_current_blog_id());
        return self::normalise(is_array($values) ? $values : []);
    }

    private function storage(): string
    {
        // Both the options page and renderer must use the same content language.
        // An administrator's personal UI language must not select other data.
        $storage = apply_filters('one202x/site_contacts/storage', self::STORAGE, get_locale(), get_current_blog_id());
        return is_string($storage) && $storage !== '' ? $storage : self::STORAGE;
    }

    /** Only explicitly public fields leave this data boundary. */
    public static function normalise(array $values): array
    {
        $result = ['locations' => [], 'phones' => [], 'emails' => []];
        foreach ($result as $kind => $_) {
            $rows = $values[$kind] ?? [];
            if (!is_array($rows)) {
                continue;
            }
            foreach ($rows as $row) {
                if (!is_array($row)) {
                    continue;
                }
                $text = static fn(string $key): string => is_string($row[$key] ?? null) ? $row[$key] : '';
                $label = sanitize_text_field($text('label'));
                if ($kind === 'locations') {
                    $address = sanitize_textarea_field($text('address'));
                    if ($address !== '') {
                        $result[$kind][] = ['label' => $label, 'address' => $address];
                    }
                } elseif ($kind === 'emails') {
                    $email = sanitize_email($text('email'));
                    if (is_email($email)) {
                        $result[$kind][] = ['label' => $label, 'email' => $email];
                    }
                } else {
                    $number = sanitize_text_field($text('number'));
                    $dial = preg_replace('/[^0-9+]/', '', $number);
                    if (preg_match('/^\+?[0-9]+$/D', $dial)) {
                        $result[$kind][] = ['label' => $label, 'number' => $number, 'dial' => $dial];
                    }
                }
            }
        }
        return $result;
    }
}
