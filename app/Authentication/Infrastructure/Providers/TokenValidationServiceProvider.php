<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\Providers;

use App\Authentication\Application\Mappers\TokenValidationMapper\TokenValidationMapper;
use App\Authentication\Application\Mappers\TokenValidationMapper\TokenValidationMapperContract;
use App\Authentication\Application\Services\TokenValidationService\TokenValidationService;
use App\Authentication\Application\Services\TokenValidationService\TokenValidationServiceContract;
use App\Authentication\Core\UseCases\TokenValidationUseCase\TokenValidationUseCase;
use App\Authentication\Core\UseCases\TokenValidationUseCase\TokenValidationUseCaseContract;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOFactory\TokenValidationRequestDTOFactory;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOFactory\TokenValidationRequestDTOFactoryContract;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation\TokenValidationRequestDTOValidation;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation\TokenValidationRequestDTOValidationContract;
use Illuminate\Support\ServiceProvider;

final class TokenValidationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // RequestDTOFactory
        $this->app->bind(
            TokenValidationRequestDTOFactoryContract::class,
            TokenValidationRequestDTOFactory::class
        );

        // RequestDTOValidation
        $this->app->bind(
            TokenValidationRequestDTOValidationContract::class,
            TokenValidationRequestDTOValidation::class
        );

        // Mappers
        $this->app->bind(
            TokenValidationMapperContract::class,
            TokenValidationMapper::class
        );

        // Services
        $this->app->bind(
            TokenValidationServiceContract::class,
            TokenValidationService::class
        );

        // UseCases
        $this->app->bind(
            TokenValidationUseCaseContract::class,
            TokenValidationUseCase::class
        );
    }
}