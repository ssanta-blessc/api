<?php

declare(strict_types=1);

namespace App\Authentication\Core\UseCases\VKAuthenticationUseCase;

use App\Authentication\Core\Domain\Entity\User\ValueObject\RequestValueObject\VKAuthenticationRequestValueObject;
use App\Authentication\Core\Domain\Entity\User\ValueObject\ResponseValueObject\VKAuthenticationResponseValueObject;

interface VKAuthenticationUseCaseContract
{
    public function authenticate(VKAuthenticationRequestValueObject $requestValueObject
    ): VKAuthenticationResponseValueObject;
}