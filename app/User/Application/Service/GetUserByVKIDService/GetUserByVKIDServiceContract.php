<?php

declare(strict_types=1);

namespace App\User\Application\Service\GetUserByVKIDService;

use App\User\Application\RequestDTO\GetUserByVKIDRequestDTO;
use App\User\Application\ResponseDTO\GetUserByVKIDResponseDTO;

interface GetUserByVKIDServiceContract
{
    public function getByVKID(GetUserByVKIDRequestDTO $DTO): GetUserByVKIDResponseDTO;
}