<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\CreateUserAPI;

use App\Authentication\Core\Domain\Entity\User\VKAuthentication;

interface CreateUserAPIContract
{
    public function createUser(VKAuthentication $authentication): VKAuthentication;
}