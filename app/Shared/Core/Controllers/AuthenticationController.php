<?php

declare(strict_types=1);

namespace App\Shared\Core\Controllers;

use App\Authentication\Presentation\API\VKAuthenticationAPI\VKAuthenticationAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final readonly class AuthenticationController
{
    public function __construct(private VKAuthenticationAPI $vk)
    {
    }

    public function vk(Request $request): JsonResponse
    {
        return $this->vk->authenticationFromData(
            $request->query('code')
        );
    }
}