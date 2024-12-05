<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOFactory;

use App\Authentication\Application\RequestDTO\TokenValidationRequestDTO;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation\TokenValidationRequestDTOValidationContract;
use App\Authentication\Presentation\API\TokenValidationAPI\Templates\RequestTemplate;

final readonly class TokenValidationRequestDTOFactory implements TokenValidationRequestDTOFactoryContract
{
    public function __construct(
        private TokenValidationRequestDTOValidationContract $requestDTOValidation,
    ) {
    }

    public function create(RequestTemplate $requestTemplate): TokenValidationRequestDTO
    {
        $this->requestDTOValidation->validate($requestTemplate);
        return new TokenValidationRequestDTO(
            $requestTemplate->getToken()
        );
    }

}