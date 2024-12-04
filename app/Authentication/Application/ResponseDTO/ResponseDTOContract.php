<?php

declare(strict_types=1);

namespace App\Authentication\Application\ResponseDTO;

interface ResponseDTOContract
{
    public function toArray(): array;

    public function toJson(): string;
}