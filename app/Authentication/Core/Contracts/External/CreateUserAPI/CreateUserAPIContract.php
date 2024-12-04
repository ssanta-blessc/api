<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\CreateUserAPI;

use App\Authentication\Core\Domain\Entity\User\VKAuthentication;
use App\Authentication\Infrastructure\External\CreateUserAPI\CreateUserAPIException;

interface CreateUserAPIContract
{
    /**
     * @throws CreateUserAPIException
     */
    public function createUser(VKAuthentication $authentication): VKAuthentication;
}