<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\VKAuthentication;

final readonly class VKAuthentication
{
    public function __construct(
        private int $vkid,
        private string $name,
        private ?int $id = null,
    ) {
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'vkid' => $this->vkid,
            'name' => $this->name,
            'id' => $this->id,
        ];
    }


}