<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\GetGroupMemberByIdWithNameVKID;

final readonly class GroupMemberWithNameVKIDDTO
{
    public function __construct(
        private string $name,
        private string $wish,
        private int $vkid
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWish(): string
    {
        return $this->wish;
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }

    
}