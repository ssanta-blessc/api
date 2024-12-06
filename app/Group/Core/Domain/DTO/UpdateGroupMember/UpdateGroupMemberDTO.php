<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\UpdateGroupMember;

final readonly class UpdateGroupMemberDTO
{
    public function __construct(
        private int $userId,
        private int $groupId,
        private ?int $id = null,
        private ?string $wish = null,
        private ?bool $admin = null,
        private ?int $recipientId = null,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function getWish(): ?string
    {
        return $this->wish;
    }

    public function isAdmin(): ?bool
    {
        return $this->admin;
    }

    public function getRecipientId(): ?int
    {
        return $this->recipientId;
    }

}