<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\Templates;

abstract readonly class RequestBaseTemplate
{
    public abstract function toArray(): array;

    public abstract static function fromArray(array $data): self;
}