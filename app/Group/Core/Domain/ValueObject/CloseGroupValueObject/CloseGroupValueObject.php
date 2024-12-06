<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\ValueObject\CloseGroupValueObject;

final readonly class CloseGroupValueObject
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