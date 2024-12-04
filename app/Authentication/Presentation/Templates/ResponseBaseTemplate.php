<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\Templates;

abstract class ResponseBaseTemplate
{
    public array $responseArray;

    public function __construct()
    {
        $this->responseArray = [
            'data' => []
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->responseArray);
    }
}