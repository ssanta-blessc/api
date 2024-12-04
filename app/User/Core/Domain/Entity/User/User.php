<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User;

final readonly class User
{
    public function __construct(
        private string $name,
        private ?int $id = null
    ) {
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