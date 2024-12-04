<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\User\ValueObject\ResponseValueObject;

final readonly class VKAuthenticateResponseValueObject
{
    public function __construct(
        private string $token
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }
}