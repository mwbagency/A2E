<?php

declare(strict_types=1);

namespace One202x\Platform;

use One202x\Platform\Acf\Groups\SiteContactFields;
use One202x\Platform\Content\SiteContacts;

final class Plugin
{
    public function register_hooks(): void
    {
        (new SiteContacts())->register_hooks();
        (new SiteContactFields())->register_hooks();

        // Field definitions are versioned in the owning content modules.
        add_filter('acf/settings/show_admin', '__return_false');

        add_filter('acf/settings/enable_datastore', '__return_true');
    }
}
