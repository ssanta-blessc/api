<?php

declare(strict_types=1);

namespace App\User\Core\UseCases\CreateUserUseCase;

use App\User\Core\Domain\Entity\User\ValueObject\CreateUserValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\NameValueObject;

interface CreateUserUseCaseContract
{
    public function createUser(NameValueObject $name): CreateUserValueObject;
}