<?php

declare(strict_types=1);

namespace App\User\Application\Service\CreateUserService;

use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Application\ResponseDTO\CreateUserResponseDTO;

interface CreateUserServiceContract
{
    public function create(CreateUserRequestDTO $createUserRequestDTO): CreateUserResponseDTO;
}