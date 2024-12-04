<?php

declare(strict_types=1);

namespace App\Authentication\Core\Domain\Entity\User\ValueObject\RequestValueObject;

final readonly class VKAuthenticateRequestValueObject
{
    public function __construct(
        private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }


}