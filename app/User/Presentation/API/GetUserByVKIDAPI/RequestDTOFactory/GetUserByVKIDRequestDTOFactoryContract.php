<?php

declare(strict_types=1);

namespace App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOFactory;

use App\User\Application\RequestDTO\GetUserByVKIDRequestDTO;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation\GetUserByVKIDRequestDTOValidationException;
use App\User\Presentation\API\GetUserByVKIDAPI\Templates\RequestTemplate;

interface GetUserByVKIDRequestDTOFactoryContract
{
    /**
     * @throws GetUserByVKIDRequestDTOValidationException
     */
    public function create(RequestTemplate $data): GetUserByVKIDRequestDTO;
}