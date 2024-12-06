<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\GetGroupMemberById;

final readonly class GetGroupMemberByIdDTO
{
    public function __construct(
        private int $id,
        private int $groupId,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }


}