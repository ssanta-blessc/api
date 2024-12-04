<?php

declare(strict_types=1);

namespace App\Authentication\Application\RequestDTO;

interface RequestDTOContract
{
    public function toArray(): array;

    public function toJson(): string;
}