<?php

declare(strict_types=1);

namespace App\User\Core\UseCases\CreateUserUseCase;

use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Core\Domain\Entity\User\User;
use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\CreateUserRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\CreateUserResponseValueObject;
use App\User\Infrastructure\Database\Repository\UserRepository\UserRepositoryException;

final readonly class CreateUserUseCase implements CreateUserUseCaseContract
{
    public function __construct(
        private UserRepositoryContract $userRepository,
    ) {
    }

    public function createUser(CreateUserRequestValueObject $valueObject): CreateUserResponseValueObject
    {
        try {
            $user = $this->userRepository->create(
                new User(
                    $valueObject->getName(),
                    $valueObject->getVkid()
                )
            );
        } catch (UserRepositoryException $e) {
            return new CreateUserResponseValueObject(
                false,
                "Create user failed",
                500
            );
        }

        return new CreateUserResponseValueObject(
            true,
            null,
            $user->getId(),
            $user->getName(),
            $user->getVkid(),
        );
    }
}