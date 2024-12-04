<?php

declare(strict_types=1);

namespace App\User\Application\Mapper\GetUserByVKIDMapper;

use App\User\Application\RequestDTO\GetUserByVKIDRequestDTO;
use App\User\Application\ResponseDTO\GetUserByVKIDResponseDTO;
use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\GetUserByVKIDRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\GetUserByVKIDResponseValueObject;

interface GetUserByVKIDMapperContract
{
    public function toResponseDTO(GetUserByVKIDResponseValueObject $valueObject): GetUserByVKIDResponseDTO;

    public function toRequestValueObject(GetUserByVKIDRequestDTO $DTO): GetUserByVKIDRequestValueObject;
}