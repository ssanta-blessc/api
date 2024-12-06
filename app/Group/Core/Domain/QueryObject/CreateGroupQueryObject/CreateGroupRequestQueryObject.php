<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\QueryObject\CreateGroupQueryObject;

final readonly class CreateGroupRequestQueryObject
{
    public function __construct(
        private string $name,
        private int $userId
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }


}