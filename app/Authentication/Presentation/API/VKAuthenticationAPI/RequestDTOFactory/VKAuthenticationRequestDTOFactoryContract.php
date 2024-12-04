<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOFactory;

use App\Authentication\Application\RequestDTO\VKAuthenticationRequestDTO;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation\VKAuthenticationRequestDTOValidationException;
use App\Authentication\Presentation\API\VKAuthenticationAPI\Templates\RequestTemplate;

interface VKAuthenticationRequestDTOFactoryContract
{
    /**
     * @throws VKAuthenticationRequestDTOValidationException
     */
    public function create(RequestTemplate $data): VKAuthenticationRequestDTO;
}