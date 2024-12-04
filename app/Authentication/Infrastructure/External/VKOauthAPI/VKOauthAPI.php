<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\External\VKOauthAPI;

use App\Authentication\Core\Contracts\External\VKOauthAPI\VKOauthAPIContract;
use App\Authentication\Core\Domain\Entity\User\VKAuthentication;
use Exception;
use VK\Client\VKApiClient;
use VK\OAuth\VKOAuth;

final readonly class VKOauthAPI implements VKOauthAPIContract
{
    
    public function getUser(string $code): VKAuthentication
    {
        $oauth = new VKOAuth('5.199');

        try {
            $token = $oauth->getAccessToken(
                config('services.vk.client_id'),
                config('services.vk.client_secret'),
                config('services.vk.redirect_uri'),
                $code
            );

            $userData = (new VKApiClient())->users()->get((string)$token);

            return new VKAuthentication(
                $userData['id'],
                $userData['first_name'] . ' ' . $userData['last_name'],
            );
        } catch (Exception $e) {
            throw new VKOauthAPIException($e->getMessage());
        }
    }
}