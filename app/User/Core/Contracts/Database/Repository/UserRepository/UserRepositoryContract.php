<?php

declare(strict_types=1);

namespace App\User\Core\Contracts\Database\Repository\UserRepository;

use App\User\Core\Domain\Entity\User\User;
use App\User\Infrastructure\Database\Repository\UserRepository\UserRepositoryException;

interface UserRepositoryContract
{
    /**
     * @throws UserRepositoryException
     */
    public function create(User $user): User;


    /**
     * @throws UserRepositoryException
     */
    public function getByVKID(int $id): User;


}