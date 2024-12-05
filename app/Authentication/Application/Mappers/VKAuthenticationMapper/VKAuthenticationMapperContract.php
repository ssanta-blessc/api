<?php

declare(strict_types=1);

namespace App\Authentication\Application\Mappers\VKAuthenticationMapper;

use App\Authentication\Application\ResponseDTO\VKAuthenticationResponseDTO;
use App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\ResponseValueObject\VKAuthenticationResponseValueObject;

interface VKAuthenticationMapperContract
{
    public function toVKAuthenticationResponseDTO(
        VKAuthenticationResponseValueObject $valueObject
    ): VKAuthenticationResponseDTO;

}