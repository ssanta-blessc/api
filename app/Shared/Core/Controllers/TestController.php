<?php

declare(strict_types=1);

namespace App\Shared\Core\Controllers;

use App\User\Infrastructure\Database\Models\User;

final readonly class TestController
{
    public function index(): void
    {
        echo 'test';
    }

    public function getUsers()
    {
        return response()->json(
            User::all()
        );
    }
}