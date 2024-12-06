<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Providers;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Infrastructure\Database\Repository\GroupRepository\GroupRepository;

final class GroupServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            GroupRepositoryContract::class,
            GroupRepository::class,
        );
    }
}