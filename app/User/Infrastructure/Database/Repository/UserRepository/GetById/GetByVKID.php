<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Database\Repository\UserRepository\GetById;

use App\User\Infrastructure\Database\Models\User as UserModel;

final readonly class GetByVKID
{
    public function getById(int $id): UserModel
    {
        return UserModel::where('vkid', $id)->firstOrFail();
    }
}