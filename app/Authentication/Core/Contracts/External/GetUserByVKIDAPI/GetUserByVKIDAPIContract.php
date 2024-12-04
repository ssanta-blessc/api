<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\GetUserByVKIDAPI;

use App\Authentication\Core\Domain\Entity\User\VKAuthentication;

interface GetUserByVKIDAPIContract
{
    public function getUserByVKID(int $vkid): VKAuthentication;
}