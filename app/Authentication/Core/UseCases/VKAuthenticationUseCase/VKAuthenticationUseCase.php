<?php

declare(strict_types=1);

namespace App\Authentication\Core\UseCases\VKAuthenticationUseCase;

use App\Authentication\Core\Contracts\External\CreateUserAPI\CreateUserAPIContract;
use App\Authentication\Core\Contracts\External\GetUserByVKIDAPI\GetUserByVKIDAPIContract;
use App\Authentication\Core\Domain\Entity\User\ValueObject\RequestValueObject\VKAuthenticationRequestValueObject;
use App\Authentication\Core\Domain\Entity\User\ValueObject\ResponseValueObject\VKAuthenticationResponseValueObject;
use App\Authentication\Core\Domain\Entity\User\VKAuthentication;
use App\Authentication\Infrastructure\External\ExternalException;
use Firebase\JWT\JWT;

final readonly class VKAuthenticationUseCase implements VKAuthenticationUseCaseContract
{
    public function __construct(
        private CreateUserAPIContract $createUserAPI,
        private GetUserByVKIDAPIContract $getUserByVKIDAPI
    ) {
    }

    public function authenticate(
        VKAuthenticationRequestValueObject $requestValueObject
    ): VKAuthenticationResponseValueObject {
        try {
            try {
                $VKAuthentication = $this->getUserByVKIDAPI->getUserByVKID($requestValueObject->getVKID());
            } catch (ExternalException $e) {
                $VKAuthentication = $this->createUserAPI->createUser(
                    new VKAuthentication(
                        $requestValueObject->getVkid(),
                        $requestValueObject->getName()
                    )
                );
            }

            return new VKAuthenticationResponseValueObject(
                true,
                null,
                JWT::encode(
                    ['id' => $VKAuthentication->getId()],
                    config('app.jwt_secret'),
                    'HS256'
                )
            );
        } catch (ExternalException $e) {
            return new VKAuthenticationResponseValueObject(
                false,
                json_encode([
                    'message' => "Authentication failed",
                ]),
                null,
                500
            );
        }
    }


}