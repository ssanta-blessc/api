<?php

declare(strict_types=1);

namespace App\Shared\Core\Controllers;

use App\User\Presentation\API\CreateUserAPI\CreateUserAPI;
use Illuminate\Http\Request;

final readonly class UserController
{
    public function __construct(
        private CreateUserAPI $createUserAPI
    ) {
    }

    public function store(Request $request)
    {
        return $this->createUserAPI->createFromArray(
            $request->post()
        );
    }
}