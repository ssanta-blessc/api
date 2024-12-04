<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Database\Repository\UserRepository\CreateUser;

use App\User\Core\Domain\Entity\User\User;
use App\User\Infrastructure\Database\Models\User as UserModel;

final readonly class CreateUser
{
    public function create(User $user): UserModel
    {
        $newUser = new UserModel([
            'name' => $user->getName(),
            'vkid' => $user->getVkid(),
        ]);

        $newUser->save();

        return $newUser;
    }
}