<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject;

final readonly class CreateUserRequestValueObject
{
    public function __construct(
        private string $name,
        private int $vkid
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }


}