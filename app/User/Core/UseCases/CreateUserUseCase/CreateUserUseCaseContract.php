<?php

declare(strict_types=1);

namespace App\User\Core\UseCases\CreateUserUseCase;

use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\CreateUserRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\CreateUserResponseValueObject;

interface CreateUserUseCaseContract
{
    public function createUser(CreateUserRequestValueObject $valueObject): CreateUserResponseValueObject;
}