<?php

declare(strict_types=1);

namespace App\Authentication\Core\UseCases\TokenValidationUseCase;

use App\Authentication\Core\Contracts\External\ValidateToken\ValidateTokenContract;
use App\Authentication\Core\Domain\Entity\TokenValidation\Token;
use App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\RequestValueObject\TokenValidationRequestValueObject;
use App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\ResponseValueObject\TokenValidationResponseValueObject;

final readonly class TokenValidationUseCase implements TokenValidationUseCaseContract
{
    public function __construct(
        private ValidateTokenContract $validateToken
    ) {
    }

    public function validate(TokenValidationRequestValueObject $valueObject): TokenValidationResponseValueObject
    {
        if (!$this->validateToken->validate(
            new Token($valueObject->getToken())
        )) {
            return new TokenValidationResponseValueObject(
                false,
                'Invalid token',
                422
            );
        }

        return new TokenValidationResponseValueObject(
            true,
            "OK",
        );
    }

}