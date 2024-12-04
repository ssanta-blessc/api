<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOFactory;

use App\Authentication\Application\RequestDTO\VKAuthenticationRequestDTO;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation\VKAuthenticationRequestDTOValidationContract;
use App\Authentication\Presentation\API\VKAuthenticationAPI\Templates\RequestTemplate;

final readonly class VKAuthenticationRequestDTOFactory implements VKAuthenticationRequestDTOFactoryContract
{
    public function __construct(
        private VKAuthenticationRequestDTOValidationContract $requestDTOValidation,
    ) {
    }

    public function create(RequestTemplate $data): VKAuthenticationRequestDTO
    {
        $this->requestDTOValidation->validate($data);
        return new VKAuthenticationRequestDTO(
            (string)$data->code
        );
    }
}