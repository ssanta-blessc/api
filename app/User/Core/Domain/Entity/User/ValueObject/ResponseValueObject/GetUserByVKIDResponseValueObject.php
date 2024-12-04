<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject;

final readonly class GetUserByVKIDResponseValueObject
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


}