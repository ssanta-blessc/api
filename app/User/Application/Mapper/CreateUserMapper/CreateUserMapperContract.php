<?php

declare(strict_types=1);

namespace App\User\Application\Mapper\CreateUserMapper;

use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Application\ResponseDTO\CreateUserResponseDTO;
use App\User\Core\Domain\Entity\User\ValueObject\CreateUserValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\NameValueObject;

interface CreateUserMapperContract
{
    public function toResponseDTO(CreateUserValueObject $valueObject): CreateUserResponseDTO;

    public function toNameValueObject(CreateUserRequestDTO $DTO): NameValueObject;
}