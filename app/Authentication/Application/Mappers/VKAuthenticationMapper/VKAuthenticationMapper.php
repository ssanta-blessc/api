<?php

declare(strict_types=1);

namespace App\Authentication\Application\Mappers\VKAuthenticationMapper;

use App\Authentication\Application\ResponseDTO\VKAuthenticationResponseDTO;
use App\Authentication\Core\Domain\Entity\User\ValueObject\ResponseValueObject\VKAuthenticationResponseValueObject;

final readonly class VKAuthenticationMapper implements VKAuthenticationMapperContract
{
    public function toVKAuthenticationResponseDTO(VKAuthenticationResponseValueObject $valueObject
    ): VKAuthenticationResponseDTO {
        return new VKAuthenticationResponseDTO(
            $valueObject->getSuccess(),
            $valueObject->getMessage(),
            $valueObject->getToken(),
            $valueObject->getStatus()
        );
    }

}