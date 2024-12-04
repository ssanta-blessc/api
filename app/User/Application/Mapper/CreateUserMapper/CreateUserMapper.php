<?php

declare(strict_types=1);

namespace App\User\Application\Mapper\CreateUserMapper;


use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Application\ResponseDTO\CreateUserResponseDTO;
use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\CreateUserRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\CreateUserResponseValueObject;

final readonly class CreateUserMapper implements CreateUserMapperContract
{
    public function toResponseDTO(CreateUserResponseValueObject $valueObject): CreateUserResponseDTO
    {
        return new CreateUserResponseDTO(
            $valueObject->getSuccess(),
            $valueObject->getMessage(),
            $valueObject->getId(),
            $valueObject->getName(),
            $valueObject->getVkid(),
            $valueObject->getStatus()
        );
    }

    public function toNameValueObject(CreateUserRequestDTO $DTO): CreateUserRequestValueObject
    {
        return new CreateUserRequestValueObject(
            $DTO->getName(),
            $DTO->getVkid()
        );
    }

}