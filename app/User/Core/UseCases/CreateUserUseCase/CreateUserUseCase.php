<?php

declare(strict_types=1);

namespace App\User\Core\UseCases\CreateUserUseCase;

use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Core\Domain\Entity\User\User;
use App\User\Core\Domain\Entity\User\ValueObject\CreateUserValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\NameValueObject;
use App\User\Infrastructure\Database\Repository\UserRepository\UserRepositoryException;

final readonly class CreateUserUseCase implements CreateUserUseCaseContract
{
    public function __construct(
        private UserRepositoryContract $userRepository,
    ) {
    }

    public function createUser(NameValueObject $name): CreateUserValueObject
    {
        try {
            $this->userRepository->create(
                new User($name->getName())
            );
            return new CreateUserValueObject(
                true,
                "OK"
            );
        } catch (UserRepositoryException $e) {
            return new CreateUserValueObject(
                false,
                "Error"
            );
        }
    }
}