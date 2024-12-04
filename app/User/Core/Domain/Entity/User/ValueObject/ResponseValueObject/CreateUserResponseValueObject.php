<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject;

final readonly class CreateUserResponseValueObject
{
    public function __construct(
        private bool $success,
        private ?string $message = null,
        private ?int $id = null,
        private ?string $name = null,
        private ?int $vkid = null,
        private int $status = 200
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getVkid(): ?int
    {
        return $this->vkid;
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


}