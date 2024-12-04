<?php

declare(strict_types=1);

namespace App\Shared\Core\Controllers;

use App\User\Presentation\API\CreateUserAPI\CreateUserAPI;
use App\User\Presentation\API\GetUserByVKIDAPI\GetUserByVKIDAPI;
use Illuminate\Http\Request;

final readonly class UserController
{
    public function __construct(
        private CreateUserAPI $createUserAPI,
        private GetUserByVKIDAPI $getUserByVKIDAPI,
    ) {
    }

    public function store(Request $request)
    {
        return $this->createUserAPI->createFromArray(
            $request->post()
        );
    }

    public function show(Request $request)
    {
        return $this->getUserByVKIDAPI->getByVKIDFromData($request->route('vkid'));
    }
}