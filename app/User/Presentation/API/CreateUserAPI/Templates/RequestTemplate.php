<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\Templates;

use App\User\Presentation\API\Templates\RequestBaseTemplate;

final readonly class RequestTemplate extends RequestBaseTemplate
{
    public function __construct(
        public mixed $name,
        public mixed $vkid,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'vkid' => $this->vkid,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['vkid'] ?? null
        );
    }
}