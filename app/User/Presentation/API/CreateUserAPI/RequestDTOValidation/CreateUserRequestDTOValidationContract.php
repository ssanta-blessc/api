<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\RequestDTOValidation;

use App\User\Presentation\API\CreateUserAPI\Templates\RequestTemplate;

interface CreateUserRequestDTOValidationContract
{
    /**
     * @throws CreateUserRequestDTOValidationException
     */
    public function validate(RequestTemplate $data): void;
}