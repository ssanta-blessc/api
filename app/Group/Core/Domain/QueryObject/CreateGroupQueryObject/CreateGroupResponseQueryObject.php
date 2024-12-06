<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\QueryObject\CreateGroupQueryObject;

final readonly class CreateGroupResponseQueryObject
{
    public function __construct(
        private bool $success,
        private string $message,
        private int $status = 200,
        private ?string $joinCode = null
    ) {
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getJoinCode(): ?string
    {
        return $this->joinCode;
    }


}