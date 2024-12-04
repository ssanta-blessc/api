<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\External\CreateUserAPI;

use App\Authentication\Core\Contracts\External\CreateUserAPI\CreateUserAPIContract;
use App\Authentication\Core\Domain\Entity\User\VKAuthentication;
use App\User\Presentation\API\CreateUserAPI\CreateUserAPI as API;

final readonly class CreateUserAPI implements CreateUserAPIContract
{
    public function __construct(
        private API $createUserAPI
    ) {
    }

    public function createUser(VKAuthentication $authentication): VKAuthentication
    {
        $response = $this->createUserAPI
            ->createFromData($authentication->getName())
            ->getData(true)['data'];
        
        if ($response['status'] != 200) {
            throw new CreateUserAPIException('Error creating user');
        }

        $responseData = $response->getData(true)['data']['info'];
        return new VKAuthentication(
            $responseData['vkid'],
            $responseData['name'],
            $responseData['id'],
        );
    }

}