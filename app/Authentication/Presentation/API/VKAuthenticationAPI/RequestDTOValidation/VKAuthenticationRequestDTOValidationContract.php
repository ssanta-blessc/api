<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation;

use App\Authentication\Presentation\API\VKAuthenticationAPI\Templates\RequestTemplate;

interface VKAuthenticationRequestDTOValidationContract
{
    /**
     * @throws VKAuthenticationRequestDTOValidationException
     */
    public function validate(RequestTemplate $data): void;
}