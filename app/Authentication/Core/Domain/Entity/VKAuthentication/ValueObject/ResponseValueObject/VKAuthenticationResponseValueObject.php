<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\ResponseValueObject;

final readonly class VKAuthenticationResponseValueObject
{
    public function __construct(
        private bool $success,
        private ?string $message = null,
        private ?string $token = null,
        private int $status = 200
    ) {
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }


}