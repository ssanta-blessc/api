<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Providers;

final class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->registerDeferredProvider(AddUserToGroupServiceProvider::class);

        $this->app->registerDeferredProvider(CreateGroupServiceProvider::class);

        $this->app->registerDeferredProvider(GroupServiceProvider::class);
    }
}