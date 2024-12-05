<?php

declare(strict_types=1);

namespace App\Authentication\Core\UseCases\VKAuthenticationUseCase;

use App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\RequestValueObject\VKAuthenticationRequestValueObject;
use App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\ResponseValueObject\VKAuthenticationResponseValueObject;

interface VKAuthenticationUseCaseContract
{
    public function authenticate(VKAuthenticationRequestValueObject $requestValueObject
    ): VKAuthenticationResponseValueObject;
}