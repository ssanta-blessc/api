<?php

declare(strict_types=1);

namespace App\Group\Core\Domain\QueryObject\StartGameQueryObject;

final readonly class StartGameResponseQueryObject
{
    public function __construct(
        private bool $success,
        private string $message,
        private int $status = 200,
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


}