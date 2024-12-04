<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\Templates;

use App\User\Presentation\API\Templates\RequestBaseTemplate;

final readonly class RequestTemplate extends RequestBaseTemplate
{
    public function __construct(
        public ?string $name,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self($data['name'] ?? null);
    }
}