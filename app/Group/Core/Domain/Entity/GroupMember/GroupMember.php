<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\Entity\GroupMember;

final readonly class GroupMember
{
    public function __construct(
        private int $userId,
        private int $groupId,
        private string $wish,
        private int $id,
        private bool $admin,
        private int $recipientId,
        private string $name
    ) {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getWish(): string
    {
        return $this->wish;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getAdmin(): bool
    {
        return $this->admin;
    }

    public function getRecipientId(): int
    {
        return $this->recipientId;
    }

    public function getName(): string
    {
        return $this->name;
    }


}