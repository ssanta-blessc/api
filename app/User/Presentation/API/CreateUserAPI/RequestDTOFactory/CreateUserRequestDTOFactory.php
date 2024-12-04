<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\RequestDTOFactory;

use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Presentation\API\CreateUserAPI\RequestDTOValidation\CreateUserRequestDTOValidationContract;
use App\User\Presentation\API\CreateUserAPI\Templates\RequestTemplate;

final readonly class CreateUserRequestDTOFactory implements CreateUserRequestDTOFactoryContract
{
    public function __construct(private CreateUserRequestDTOValidationContract $validation)
    {
    }

    public function create(RequestTemplate $data): CreateUserRequestDTO
    {
        $this->validation->validate($data);
        return CreateUserRequestDTO::fromArray($data->toArray());
    }
}