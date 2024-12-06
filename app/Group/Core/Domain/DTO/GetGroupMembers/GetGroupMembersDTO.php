<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\GetGroupMembers;

final readonly class GetGroupMembersDTO
{
    public function __construct(
        private int $groupId,
    ) {
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }
    

}