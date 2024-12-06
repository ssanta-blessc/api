<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\ValueObject\AssignSantaValueObject;

final readonly class AssignSantaValueObject
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