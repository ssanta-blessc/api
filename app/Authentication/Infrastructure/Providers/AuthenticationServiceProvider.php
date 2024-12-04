<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\Providers;

use App\Authentication\Core\Contracts\External\CreateUserAPI\CreateUserAPIContract;
use App\Authentication\Core\Contracts\External\GetUserByVKIDAPI\GetUserByVKIDAPIContract;
use App\Authentication\Core\Contracts\External\VKOauthAPI\VKOauthAPIContract;
use App\Authentication\Infrastructure\External\CreateUserAPI\CreateUserAPI;
use App\Authentication\Infrastructure\External\GetUserByVKIDAPI\GetUserByVKIDAPI;
use App\Authentication\Infrastructure\External\VKOauthAPI\VKOauthAPI;

final class AuthenticationServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // External
        $this->app->bind(
            CreateUserAPIContract::class,
            CreateUserAPI::class
        );

        $this->app->bind(
            GetUserByVKIDAPIContract::class,
            GetUserByVKIDAPI::class
        );

        $this->app->bind(
            VKOauthAPIContract::class,
            VKOauthAPI::class
        );
    }
}