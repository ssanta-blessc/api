<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\ValueObject\CreateGroupValueObject;

final readonly class CreateGroupValueObject
{
    public function __construct(
        private string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }


}