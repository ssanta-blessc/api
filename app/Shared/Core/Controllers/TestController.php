<?php

declare(strict_types=1);

namespace App\Shared\Core\Controllers;

use VK\OAuth\VKOAuth;

final readonly class TestController
{
    public function index(): void
    {
        $oauth = new VKOAuth();

        echo 'test';
    }
}