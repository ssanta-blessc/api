<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\RequestValueObject;

final readonly class VKAuthenticationRequestValueObject
{
    public function __construct(
        private int $vkid,
        private string $name
    ) {
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }


    public function getName(): string
    {
        return $this->name;
    }


}