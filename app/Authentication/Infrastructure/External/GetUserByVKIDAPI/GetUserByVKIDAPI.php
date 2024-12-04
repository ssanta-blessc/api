<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\External\GetUserByVKIDAPI;

use App\Authentication\Core\Contracts\External\GetUserByVKIDAPI\GetUserByVKIDAPIContract;
use App\Authentication\Core\Domain\Entity\User\VKAuthentication;

final readonly class GetUserByVKIDAPI implements GetUserByVKIDAPIContract
{
    public function __construct(
        private \App\User\Presentation\API\GetUserByVKIDAPI\GetUserByVKIDAPI $getUserByVKIDAPI
    ) {
    }

    public function getUserByVKID(int $vkid): VKAuthentication
    {
        $response = $this->getUserByVKIDAPI->getByVKIDFromData($vkid);
        if ($response->status() != 200) {
            throw new GetUserByVKIDAPIException('User not Found');
        }

        $responseData = $response->getData(true)['data']['info'];
        return new VKAuthentication(
            $responseData['vkid'],
            $responseData['name'],
            $responseData['id'],
        );
    }

}