<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Providers;

use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Infrastructure\Database\Repository\UserRepository\UserRepository;
use Illuminate\Support\ServiceProvider;

final class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repository
        $this->app->bind(
            UserRepositoryContract::class,
            UserRepository::class
        );
    }
}