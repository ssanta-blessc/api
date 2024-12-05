<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI\Templates;

use App\Authentication\Presentation\Templates\RequestBaseTemplate;

final readonly class RequestTemplate extends RequestBaseTemplate
{
    public function __construct(
        private mixed $token,
    ) {
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['token'] ?? null
        );
    }

    public function getToken(): mixed
    {
        return $this->token;
    }


}