<?php

declare(strict_types=1);

namespace App\Shared\Core\Controllers;

final readonly class TestController
{
    public function index(): void
    {
        echo 'test';
    }
}