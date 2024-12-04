<?php

declare(strict_types=1);

namespace App\User\Application\Mapper\GetUserByVKIDMapper;

use App\User\Application\RequestDTO\GetUserByVKIDRequestDTO;
use App\User\Application\ResponseDTO\GetUserByVKIDResponseDTO;
use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\GetUserByVKIDRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\GetUserByVKIDResponseValueObject;

final readonly class GetUserByVKIDMapper implements GetUserByVKIDMapperContract
{

    public function toResponseDTO(GetUserByVKIDResponseValueObject $valueObject): GetUserByVKIDResponseDTO
    {
        return new GetUserByVKIDResponseDTO(
            $valueObject->getSuccess(),
            $valueObject->getMessage(),
            $valueObject->getName(),
            $valueObject->getId(),
            $valueObject->getVkid(),
            $valueObject->getStatus()
        );
    }

    public function toRequestValueObject(GetUserByVKIDRequestDTO $DTO): GetUserByVKIDRequestValueObject
    {
        return new GetUserByVKIDRequestValueObject(
            $DTO->getVkid()
        );
    }
}