<?php

declare(strict_types=1);

namespace App\Authentication\Application\RequestDTO;

final readonly class AuthenticationRequestDTO implements RequestDTOContract
{
    public function __construct(
        private string $code
    ) {
    }

    public function getCode(): string
    {
        return $this->code;
    }


    public function toArray(): array
    {
        return [
            'code' => $this->code,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public static function fromArray(array $data): RequestDTOContract
    {
        return new self($data['code']);
    }

}