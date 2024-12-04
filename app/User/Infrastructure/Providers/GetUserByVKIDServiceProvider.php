<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Providers;

use App\User\Application\Mapper\GetUserByVKIDMapper\GetUserByVKIDMapper;
use App\User\Application\Mapper\GetUserByVKIDMapper\GetUserByVKIDMapperContract;
use App\User\Application\Service\GetUserByVKIDService\GetUserByVKIDService;
use App\User\Application\Service\GetUserByVKIDService\GetUserByVKIDServiceContract;
use App\User\Core\UseCases\GetUserByVKIDUseCase\GetUserByVKIDUseCase;
use App\User\Core\UseCases\GetUserByVKIDUseCase\GetUserByVKIDUseCaseContract;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOFactory\GetUserByVKIDRequestDTOFactory;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOFactory\GetUserByVKIDRequestDTOFactoryContract;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation\GetUserByVKIDRequestDTOValidation;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation\GetUserByVKIDRequestDTOValidationContract;

final class GetUserByVKIDServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // RequestDTOFactory
        $this->app->bind(
            GetUserByVKIDRequestDTOFactoryContract::class,
            GetUserByVKIDRequestDTOFactory::class
        );

        // RequestDTOValidation
        $this->app->bind(
            GetUserByVKIDRequestDTOValidationContract::class,
            GetUserByVKIDRequestDTOValidation::class
        );

        // Mappers
        $this->app->bind(
            GetUserByVKIDMapperContract::class,
            GetUserByVKIDMapper::class
        );

        // Services
        $this->app->bind(
            GetUserByVKIDServiceContract::class,
            GetUserByVKIDService::class
        );

        // UseCases
        $this->app->bind(
            GetUserByVKIDUseCaseContract::class,
            GetUserByVKIDUseCase::class
        );
    }
}