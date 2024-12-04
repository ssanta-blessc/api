<?php

declare(strict_types=1);

namespace App\User\Application\Mapper\CreateUserMapper;

use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Application\ResponseDTO\CreateUserResponseDTO;
use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\CreateUserRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\CreateUserResponseValueObject;

interface CreateUserMapperContract
{
    public function toResponseDTO(CreateUserResponseValueObject $valueObject): CreateUserResponseDTO;

    public function toNameValueObject(CreateUserRequestDTO $DTO): CreateUserRequestValueObject;
}