<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\VKOauthAPI;

use App\Authentication\Core\Domain\Entity\VKAuthentication\VKAuthentication;
use App\Authentication\Infrastructure\External\VKOauthAPI\VKOauthAPIException;

interface VKOauthAPIContract
{
    /**
     * @throws VKOauthAPIException
     */
    public function getUser(string $code): VKAuthentication;
}