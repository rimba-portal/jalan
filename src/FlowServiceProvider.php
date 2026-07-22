<?php

declare(strict_types=1);

namespace Rimba\Flow;

use Rimba\Base\BitesServiceProvider;

class FlowServiceProvider extends BitesServiceProvider
{
    protected function bootPackage(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        //
    }

    protected function registerPackage(): void
    {
        //
    }
}
