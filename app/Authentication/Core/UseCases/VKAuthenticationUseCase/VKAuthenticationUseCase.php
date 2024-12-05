<?php

declare(strict_types=1);

namespace App\Authentication\Core\UseCases\VKAuthenticationUseCase;

use App\Authentication\Core\Contracts\External\CreateToken\CreateTokenContract;
use App\Authentication\Core\Contracts\External\CreateUserAPI\CreateUserAPIContract;
use App\Authentication\Core\Contracts\External\GetUserByVKIDAPI\GetUserByVKIDAPIContract;
use App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\RequestValueObject\VKAuthenticationRequestValueObject;
use App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\ResponseValueObject\VKAuthenticationResponseValueObject;
use App\Authentication\Core\Domain\Entity\VKAuthentication\VKAuthentication;
use App\Authentication\Infrastructure\External\ExternalException;

final readonly class VKAuthenticationUseCase implements VKAuthenticationUseCaseContract
{
    public function __construct(
        private CreateUserAPIContract $createUserAPI,
        private GetUserByVKIDAPIContract $getUserByVKIDAPI,
        private CreateTokenContract $createToken,
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
                $this->createToken->create($VKAuthentication)
            );
        } catch (ExternalException $e) {
            return new VKAuthenticationResponseValueObject(
                false,
                "Authentication failed",
                null,
                500
            );
        }
    }


}