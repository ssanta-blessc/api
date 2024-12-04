<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Database\Repository\UserRepository;

use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Core\Domain\Entity\User\User;
use App\User\Infrastructure\Database\Models\User as UserModel;
use App\User\Infrastructure\Database\Repository\UserRepository\CreateUser\CreateUser;
use Exception;

final readonly class UserRepository implements UserRepositoryContract
{
    public function __construct(
        private CreateUser $createUser
    ) {
    }

    
    public function create(User $user): UserModel
    {
        try {
            return $this->createUser->create($user);
        } catch (Exception $exception) {
            throw new UserRepositoryException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}