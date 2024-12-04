<?php

declare(strict_types=1);

namespace App\Authentication\Application\Services\VKAuthenticationService;

use App\Authentication\Application\RequestDTO\VKAuthenticationRequestDTO;
use App\Authentication\Application\ResponseDTO\VKAuthenticationResponseDTO;

interface VKAuthenticationServiceContract
{
    public function authenticate(VKAuthenticationRequestDTO $requestDTO): VKAuthenticationResponseDTO;
}