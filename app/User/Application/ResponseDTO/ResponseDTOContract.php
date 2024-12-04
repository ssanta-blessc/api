<?php

declare(strict_types=1);

namespace App\User\Application\ResponseDTO;

interface ResponseDTOContract
{
    public function toArray(): array;

    public function toJson(): string;

    public static function fromArray(array $data): self;
}