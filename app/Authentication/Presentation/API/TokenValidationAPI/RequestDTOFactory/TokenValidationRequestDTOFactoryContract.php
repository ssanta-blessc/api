<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOFactory;

use App\Authentication\Application\RequestDTO\TokenValidationRequestDTO;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation\TokenValidationRequestDTOValidationException;
use App\Authentication\Presentation\API\TokenValidationAPI\Templates\RequestTemplate;

interface TokenValidationRequestDTOFactoryContract
{
    /**
     * @throws TokenValidationRequestDTOValidationException
     */
    public function create(RequestTemplate $requestTemplate): TokenValidationRequestDTO;
}