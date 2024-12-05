<?php

declare(strict_types=1);

namespace App\Authentication\Application\ResponseDTO;

final readonly class TokenValidationResponseDTO implements ResponseDTOContract
{

    public function __construct(
        private bool $success,
        private ?string $message = null,
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

    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'status' => $this->status,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}