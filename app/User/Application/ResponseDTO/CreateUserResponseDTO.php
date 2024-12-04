<?php

declare(strict_types=1);

namespace App\User\Application\ResponseDTO;

final readonly class CreateUserResponseDTO implements ResponseDTOContract
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

    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public static function fromArray(array $data): ResponseDTOContract
    {
        return new self($data['success'], $data['message']);
    }
}