<?php

declare(strict_types=1);

namespace One202x\Events;

final class Plugin
{
    public function register_hooks(): void
    {
        (new EventPostType())->register_hooks();
        (new EventTaxonomy())->register_hooks();
        (new EventFields())->register_hooks();
    }
}
