<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User\ValueObject;

final readonly class CreateUserValueObject
{
    public function __construct(
        private bool $success,
        private string $message,
    ) {
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): string
    {
        return $this->message;
    }


}