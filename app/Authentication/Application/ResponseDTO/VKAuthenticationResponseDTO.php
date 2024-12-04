<?php

declare(strict_types=1);

namespace App\Authentication\Application\ResponseDTO;

final readonly class VKAuthenticationResponseDTO implements ResponseDTOContract
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

    public function getMessage(): string
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

    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'success' => $this->success,
            'status' => $this->status,
            'token' => $this->token,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }


}