<?php

declare(strict_types=1);

namespace App\User\Core\UseCases\GetUserByVKIDUseCase;

use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject\GetUserByVKIDRequestValueObject;
use App\User\Core\Domain\Entity\User\ValueObject\ResponseValueObject\GetUserByVKIDResponseValueObject;
use App\User\Infrastructure\Database\Repository\UserRepository\UserRepositoryException;

final readonly class GetUserByVKIDUseCase implements GetUserByVKIDUseCaseContract
{
    public function __construct(
        private UserRepositoryContract $userRepository
    ) {
    }

    public function getByVKID(GetUserByVKIDRequestValueObject $valueObject): GetUserByVKIDResponseValueObject
    {
        try {
            $user = $this->userRepository->getByVKID(
                $valueObject->getVkid()
            );
        } catch (UserRepositoryException $e) {
            return new GetUserByVKIDResponseValueObject(
                false,
                "User not found",
                null,
                null,
                null,
                422
            );
        }

        return new GetUserByVKIDResponseValueObject(
            true,
            null,
            $user->getName(),
            $user->getId(),
            $user->getVkid(),
        );
    }

}