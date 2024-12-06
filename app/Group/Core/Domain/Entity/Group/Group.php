<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\Entity\Group;

final readonly class Group
{
    public function __construct(
        private string $joinCode,
        private int $id,
        private string $name,
        private bool $closed,
    ) {
    }

    public function getJoinCode(): string
    {
        return $this->joinCode;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClosed(): bool
    {
        return $this->closed;
    }


}