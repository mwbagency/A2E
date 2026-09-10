<?php

declare(strict_types=1);

namespace One202x\Platform\Acf\Groups;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;
use One202x\Platform\Content\SiteContacts;

final class SiteContactFields extends FieldGroup
{
    public function id(): string { return 'site_contacts'; }
    public function title(): string { return __('Shared contact details', 'one-202x-platform'); }
    public function location(): array { return Location::optionsPage(SiteContacts::PAGE); }

    public function fields(): array
    {
        $label = ['id' => 'label', 'type' => 'text', 'label' => __('Label', 'one-202x-platform'),
            'instructions' => __('Optional office or department name.', 'one-202x-platform')];
        return [
            ['id' => 'help', 'type' => 'message', 'label' => __('Used across the site', 'one-202x-platform'),
                'message' => __('These are public business details. Shared Contact Details blocks update wherever they are used. The first telephone number is used in the default header. Existing manually entered page content remains independent.', 'one-202x-platform')],
            ['id' => 'locations', 'type' => 'repeater', 'label' => __('Locations', 'one-202x-platform'),
                'layout' => 'block', 'button_label' => __('Add location', 'one-202x-platform'),
                'fields' => [$label, ['id' => 'address', 'type' => 'textarea', 'rows' => 4, 'required' => true,
                    'label' => __('Address', 'one-202x-platform'), 'new_lines' => '']]],
            ['id' => 'phones', 'type' => 'repeater', 'label' => __('Telephone numbers', 'one-202x-platform'),
                'layout' => 'table', 'button_label' => __('Add telephone number', 'one-202x-platform'),
                'fields' => [$label, ['id' => 'number', 'type' => 'text', 'required' => true,
                    'label' => __('Telephone number', 'one-202x-platform'),
                    'instructions' => __('Include the international dialling code, for example +44 20 7946 0958. Use the label for extensions.', 'one-202x-platform')]]],
            ['id' => 'emails', 'type' => 'repeater', 'label' => __('Email addresses', 'one-202x-platform'),
                'layout' => 'table', 'button_label' => __('Add email address', 'one-202x-platform'),
                'fields' => [$label, ['id' => 'email', 'type' => 'email', 'required' => true,
                    'label' => __('Email address', 'one-202x-platform')]]],
        ];
    }
}
