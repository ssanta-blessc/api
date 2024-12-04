<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\Providers;

use App\Authentication\Application\Mappers\VKAuthenticationMapper\VKAuthenticationMapper;
use App\Authentication\Application\Mappers\VKAuthenticationMapper\VKAuthenticationMapperContract;
use App\Authentication\Application\Services\VKAuthenticationService\VKAuthenticationService;
use App\Authentication\Application\Services\VKAuthenticationService\VKAuthenticationServiceContract;
use App\Authentication\Core\UseCases\VKAuthenticationUseCase\VKAuthenticationUseCase;
use App\Authentication\Core\UseCases\VKAuthenticationUseCase\VKAuthenticationUseCaseContract;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOFactory\VKAuthenticationRequestDTOFactory;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOFactory\VKAuthenticationRequestDTOFactoryContract;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation\VKAuthenticationRequestDTOValidation;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation\VKAuthenticationRequestDTOValidationContract;

final class VKAuthenticationServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // RequestDTOFactory
        $this->app->bind(
            VKAuthenticationRequestDTOFactoryContract::class,
            VKAuthenticationRequestDTOFactory::class
        );

        // RequestDTOValidation
        $this->app->bind(
            VKAuthenticationRequestDTOValidationContract::class,
            VKAuthenticationRequestDTOValidation::class
        );

        // Mappers
        $this->app->bind(
            VKAuthenticationMapperContract::class,
            VKAuthenticationMapper::class
        );

        // Services
        $this->app->bind(
            VKAuthenticationServiceContract::class,
            VKAuthenticationService::class
        );

        // UseCases
        $this->app->bind(
            VKAuthenticationUseCaseContract::class,
            VKAuthenticationUseCase::class
        );
    }
}