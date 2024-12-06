<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\DTO\GetGroupById;

final readonly class GetGroupByIdDTO
{
    public function __construct(
        private int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

}