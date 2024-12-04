<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\RequestDTOFactory;

use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Presentation\API\CreateUserAPI\RequestDTOValidation\CreateUserRequestDTOValidationException;
use App\User\Presentation\API\CreateUserAPI\Templates\RequestTemplate;

interface CreateUserRequestDTOFactoryContract
{
    /**
     * @throws CreateUserRequestDTOValidationException
     */
    public function create(RequestTemplate $data): CreateUserRequestDTO;
}