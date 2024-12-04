<?php

declare(strict_types=1);

namespace App\User\Application\RequestDTO;

final readonly class CreateUserRequestDTO implements RequestDTOContract
{
    public function __construct(
        private string $name,
        private int $vkid
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'vkid' => $this->vkid
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

}