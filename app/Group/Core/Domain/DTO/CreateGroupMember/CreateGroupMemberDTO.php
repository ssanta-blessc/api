<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\CreateGroupMember;

final readonly class CreateGroupMemberDTO
{
    public function __construct(
        private int $userId,
        private int $groupId,
        private bool $admin = false,
        private ?int $recipientId = null,
    ) {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function getRecipientId(): ?int
    {
        return $this->recipientId;
    }


}