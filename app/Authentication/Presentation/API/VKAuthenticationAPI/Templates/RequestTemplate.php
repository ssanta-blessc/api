<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\VKAuthenticationAPI\Templates;

use App\Authentication\Presentation\Templates\RequestBaseTemplate;

final readonly class RequestTemplate extends RequestBaseTemplate
{
    public function __construct(
        public mixed $code,
    ) {
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['code'] ?? null
        );
    }
}