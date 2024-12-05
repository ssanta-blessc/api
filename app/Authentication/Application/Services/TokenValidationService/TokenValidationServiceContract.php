<?php

declare(strict_types=1);

namespace App\Authentication\Application\Services\TokenValidationService;

use App\Authentication\Application\RequestDTO\TokenValidationRequestDTO;
use App\Authentication\Application\ResponseDTO\TokenValidationResponseDTO;

interface TokenValidationServiceContract
{
    public function validate(TokenValidationRequestDTO $tokenValidationRequestDTO): TokenValidationResponseDTO;
}