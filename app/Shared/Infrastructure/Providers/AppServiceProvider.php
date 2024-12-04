<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Providers;

use App\Authentication\Infrastructure\Providers\ServiceProvider as AuthenticateServiceProvider;
use App\User\Infrastructure\Providers\ServiceProvider as UserServiceProvider;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->registerDeferredProvider(UserServiceProvider::class);
        $this->app->registerDeferredProvider(AuthenticateServiceProvider::class);
    }
}