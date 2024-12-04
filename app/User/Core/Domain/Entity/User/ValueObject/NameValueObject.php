<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User\ValueObject;

final readonly class NameValueObject
{
    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}