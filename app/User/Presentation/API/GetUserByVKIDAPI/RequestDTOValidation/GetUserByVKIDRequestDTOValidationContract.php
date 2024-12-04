<?php

declare(strict_types=1);

namespace App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation;

use App\User\Presentation\API\CreateUserAPI\RequestDTOValidation\GetUserByVKIDRequestDTOValidationException;
use App\User\Presentation\API\GetUserByVKIDAPI\Templates\RequestTemplate;

interface GetUserByVKIDRequestDTOValidationContract
{
    /**
     * @throws GetUserByVKIDRequestDTOValidationException
     */
    public function validate(RequestTemplate $data): void;
}