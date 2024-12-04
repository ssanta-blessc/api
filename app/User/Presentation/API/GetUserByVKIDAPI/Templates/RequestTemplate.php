<?php

declare(strict_types=1);

namespace App\User\Presentation\API\GetUserByVKIDAPI\Templates;

use App\User\Presentation\API\Templates\RequestBaseTemplate;

final readonly class RequestTemplate extends RequestBaseTemplate
{
    public function __construct(
        public mixed $vkid,
    ) {
    }

    public function toArray(): array
    {
        return [
            'vkid' => $this->vkid,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['vkid'] ?? null
        );
    }
}