<?php

declare(strict_types=1);

namespace App\User\Application\RequestDTO;

final readonly class GetUserByVKIDRequestDTO implements RequestDTOContract
{

    public function __construct(
        private int $vkid
    ) {
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }

    public function toArray(): array
    {
        return [
            'vkid' => $this->vkid
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}