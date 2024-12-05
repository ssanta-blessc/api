<?php

declare(strict_types=1);

namespace App\Authentication\Application\Services\VKAuthenticationService;

use App\Authentication\Application\Mappers\VKAuthenticationMapper\VKAuthenticationMapperContract;
use App\Authentication\Application\RequestDTO\VKAuthenticationRequestDTO;
use App\Authentication\Application\ResponseDTO\VKAuthenticationResponseDTO;
use App\Authentication\Core\Domain\Entity\VKAuthentication\ValueObject\RequestValueObject\VKAuthenticationRequestValueObject;
use App\Authentication\Core\UseCases\VKAuthenticationUseCase\VKAuthenticationUseCaseContract;
use App\Authentication\Infrastructure\External\ExternalException;
use App\Authentication\Infrastructure\External\VKOauthAPI\VKOauthAPI;

final readonly class VKAuthenticationService implements VKAuthenticationServiceContract
{
    public function __construct(
        private VKOauthAPI $VKOauthAPI,
        private VKAuthenticationMapperContract $VKAuthenticationMapper,
        private VKAuthenticationUseCaseContract $VKAuthenticationUseCase,
    ) {
    }

    public function authenticate(VKAuthenticationRequestDTO $requestDTO): VKAuthenticationResponseDTO
    {
        try {
            $VKAuthentication = $this->VKOauthAPI->getUser(
                $requestDTO->getCode()
            );

            return $this->VKAuthenticationMapper->toVKAuthenticationResponseDTO(
                $this->VKAuthenticationUseCase->authenticate(
                    new VKAuthenticationRequestValueObject(
                        $VKAuthentication->getVkid(),
                        $VKAuthentication->getName()
                    )
                )
            );
        } catch (ExternalException $exception) {
            return new VKAuthenticationResponseDTO(
                false,
                "Authentication failed",
                null,
                500
            );
        }
    }

}