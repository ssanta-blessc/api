<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\UpdateGroupDTO;

final readonly class UpdateGroupDTO
{
    public function __construct(
        private int $id,
        private ?bool $closed = null,
        private ?string $joinCode = null,
        private ?string $name = null,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isClosed(): ?bool
    {
        return $this->closed;
    }

    public function getJoinCode(): ?string
    {
        return $this->joinCode;
    }

    public function getName(): ?string
    {
        return $this->name;
    }


}