<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Database\Repository\UserRepository;

use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Core\Domain\Entity\User\User;
use App\User\Infrastructure\Database\Repository\UserRepository\CreateUser\CreateUser;
use App\User\Infrastructure\Database\Repository\UserRepository\GetById\GetByVKID;
use Exception;

final readonly class UserRepository implements UserRepositoryContract
{
    public function __construct(
        private CreateUser $createUser,
        private GetByVKID $getByVKID
    ) {
    }


    public function create(User $user): User
    {
        try {
            $newUser = $this->createUser->create($user);
            return new User(
                $newUser->name,
                $newUser->vkid,
                $newUser->id
            );
        } catch (Exception $exception) {
            throw new UserRepositoryException($exception->getMessage(), $exception->getCode());
        }
    }

    public function getByVKID(int $id): User
    {
        try {
            $user = $this->getByVKID->getById($id);
            return new User(
                $user->name,
                $user->vkid,
                $user->id
            );
        } catch (Exception $exception) {
            throw new UserRepositoryException($exception->getMessage(), $exception->getCode());
        }
    }
}