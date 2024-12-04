<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\User;

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


}