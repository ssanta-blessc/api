<?php

declare(strict_types=1);

namespace App\User\Application\Mapper\CreateUserMapper;


use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Application\ResponseDTO\CreateUserResponseDTO;
use App\User\Core\Domain\Entity\User\ValueObject\CreateUserValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\NameValueObject;

final readonly class CreateUserMapper implements CreateUserMapperContract
{
    public function toResponseDTO(CreateUserValueObject $valueObject): CreateUserResponseDTO
    {
        return new CreateUserResponseDTO(
            $valueObject->getSuccess(),
            $valueObject->getMessage()
        );
    }

    public function toNameValueObject(CreateUserRequestDTO $DTO): NameValueObject
    {
        return new NameValueObject(
            $DTO->getName(),
        );
    }

}