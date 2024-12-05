<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\TokenValidation;

final readonly class Token
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