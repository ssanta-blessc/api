<?php

declare(strict_types=1);

namespace App\Authentication\Application\Mappers\TokenValidationMapper;

use App\Authentication\Application\RequestDTO\TokenValidationRequestDTO;
use App\Authentication\Application\ResponseDTO\TokenValidationResponseDTO;
use App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\RequestValueObject\TokenValidationRequestValueObject;
use App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\ResponseValueObject\TokenValidationResponseValueObject;

final readonly class TokenValidationMapper implements TokenValidationMapperContract
{

    public function toTokenValidationRequestValueObject(
        TokenValidationRequestDTO $tokenValidationRequestDTO
    ): TokenValidationRequestValueObject {
        return new TokenValidationRequestValueObject(
            $tokenValidationRequestDTO->getToken(),
        );
    }

    public function toTokenValidationResponseDTO(
        TokenValidationResponseValueObject $tokenValidationResponseValueObject
    ): TokenValidationResponseDTO {
        return new TokenValidationResponseDTO(
            $tokenValidationResponseValueObject->getSuccess(),
            $tokenValidationResponseValueObject->getMessage(),
            $tokenValidationResponseValueObject->getStatus()
        );
    }
}