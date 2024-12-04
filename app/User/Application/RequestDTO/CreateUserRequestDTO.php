<?php

declare(strict_types=1);

namespace App\User\Application\RequestDTO;

final readonly class CreateUserRequestDTO implements RequestDTOContract
{
    public function __construct(
        private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return ['name' => $this->name];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public static function fromArray(array $data): RequestDTOContract
    {
        return new self($data['name']);
    }
}