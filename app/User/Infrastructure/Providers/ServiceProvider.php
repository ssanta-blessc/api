<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Providers;

final class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        //Base Service Provider
        $this->app->registerDeferredProvider(UserServiceProvider::class);

        // Create User
        $this->app->registerDeferredProvider(CreateUserServiceProvider::class);

        // Get User By VKID
        $this->app->registerDeferredProvider(GetUserByVKIDServiceProvider::class);
    }
}