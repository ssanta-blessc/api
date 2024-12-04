<?php

declare(strict_types=1);

namespace App\User\Core\UseCases\GetUserByVKIDUseCase;

use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\GetUserByVKIDRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\GetUserByVKIDResponseValueObject;

interface GetUserByVKIDUseCaseContract
{
    public function getByVKID(GetUserByVKIDRequestValueObject $valueObject): GetUserByVKIDResponseValueObject;
}