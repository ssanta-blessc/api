<?php

declare(strict_types=1);

namespace App\User\Presentation\API\Templates;

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

    public abstract static function fromArray(array $data): self;
}