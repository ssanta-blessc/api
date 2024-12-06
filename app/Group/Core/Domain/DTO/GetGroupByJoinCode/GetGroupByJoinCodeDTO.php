<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\GetGroupByJoinCode;

final readonly class GetGroupByJoinCodeDTO
{
    public function __construct(
        private string $joinCode,
    ) {
    }

    public function getJoinCode(): string
    {
        return $this->joinCode;
    }


}