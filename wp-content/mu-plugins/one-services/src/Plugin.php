<?php

declare(strict_types=1);

namespace One202x\Services;

final class Plugin
{
    public function register_hooks(): void
    {
        (new ServicePostType())->register_hooks();
        (new ServiceTaxonomy())->register_hooks();
        (new ServiceFields())->register_hooks();
    }
}
