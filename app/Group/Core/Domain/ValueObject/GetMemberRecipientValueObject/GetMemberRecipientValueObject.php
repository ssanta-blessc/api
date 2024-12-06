<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\ValueObject\GetMemberRecipientValueObject;

final readonly class GetMemberRecipientValueObject
{
    public function __construct(
        private int $userId,
        private int $groupId,
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

    
}