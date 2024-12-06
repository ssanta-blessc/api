<?php

declare(strict_types=1);

namespace App\Group\Application\RequestDTO;

final readonly class AssignSantaRequestDTO
{
    public function __construct(
        private int $userId,
        private string $groupJoinCode,
    ) {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getGroupJoinCode(): string
    {
        return $this->groupJoinCode;
    }


}