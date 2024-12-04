<?php

declare(strict_types=1);

namespace App\User\Application\ResponseDTO;

final readonly class GetUserByVKIDResponseDTO implements ResponseDTOContract
{

    public function __construct(
        private bool $success,
        private ?string $message = null,
        private ?string $name = null,
        private ?int $id = null,
        private ?int $vkid = null,
        private int $status = 200
    ) {
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVkid(): ?int
    {
        return $this->vkid;
    }


    public function getStatus(): int
    {
        return $this->status;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'status' => $this->status,
            'name' => $this->name,
            'id' => $this->id,
            'vkid' => $this->vkid,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}