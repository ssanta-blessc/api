<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\CreateGroupDTO;

final readonly class CreateGroupDTO
{
    public function __construct(
        private string $name,
        private string $joinCode,
        private bool $closed,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getJoinCode(): string
    {
        return $this->joinCode;
    }

    public function isClosed(): bool
    {
        return $this->closed;
    }
}