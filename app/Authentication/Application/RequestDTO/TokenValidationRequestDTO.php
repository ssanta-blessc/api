<?php

declare(strict_types=1);

namespace App\Authentication\Application\RequestDTO;

final readonly class TokenValidationRequestDTO implements RequestDTOContract
{

    public function __construct(
        public string $token,
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }


    public function toArray(): array
    {
        return ['token' => $this->token];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}