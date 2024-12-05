<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\GetUserByVKIDAPI;

use App\Authentication\Core\Domain\Entity\VKAuthentication\VKAuthentication;
use App\Authentication\Infrastructure\External\GetUserByVKIDAPI\GetUserByVKIDAPIException;

interface GetUserByVKIDAPIContract
{
    /**
     * @throws GetUserByVKIDAPIException
     */
    public function getUserByVKID(int $vkid): VKAuthentication;
}