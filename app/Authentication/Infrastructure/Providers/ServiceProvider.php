<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\Providers;

final class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->registerDeferredProvider(VKAuthenticationServiceProvider::class);

        $this->app->registerDeferredProvider(AuthenticationServiceProvider::class);
    }
}