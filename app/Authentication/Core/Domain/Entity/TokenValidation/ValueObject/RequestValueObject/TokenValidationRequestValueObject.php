<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\RequestValueObject;

final readonly class TokenValidationRequestValueObject
{
    public function __construct(
        private string $token,
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }


}