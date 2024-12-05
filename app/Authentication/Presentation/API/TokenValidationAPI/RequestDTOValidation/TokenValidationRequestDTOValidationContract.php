<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation;

use App\Authentication\Presentation\API\TokenValidationAPI\Templates\RequestTemplate;

interface TokenValidationRequestDTOValidationContract
{
    /**
     * @throws TokenValidationRequestDTOValidationException
     */
    public function validate(RequestTemplate $requestTemplate): void;
}