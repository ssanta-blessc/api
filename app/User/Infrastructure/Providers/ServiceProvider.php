<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Providers;

use App\User\Application\Mapper\CreateUserMapper\CreateUserMapper;
use App\User\Application\Mapper\CreateUserMapper\CreateUserMapperContract;
use App\User\Application\Service\CreateUserService\CreateUserService;
use App\User\Application\Service\CreateUserService\CreateUserServiceContract;
use App\User\Core\Contracts\Database\Repository\UserRepository\UserRepositoryContract;
use App\User\Core\UseCases\CreateUserUseCase\CreateUserUseCase;
use App\User\Core\UseCases\CreateUserUseCase\CreateUserUseCaseContract;
use App\User\Infrastructure\Database\Repository\UserRepository\UserRepository;
use App\User\Presentation\API\CreateUserAPI\RequestDTOFactory\CreateUserRequestDTOFactory;
use App\User\Presentation\API\CreateUserAPI\RequestDTOFactory\CreateUserRequestDTOFactoryContract;
use App\User\Presentation\API\CreateUserAPI\RequestDTOValidation\CreateUserRequestDTOValidation;
use App\User\Presentation\API\CreateUserAPI\RequestDTOValidation\CreateUserRequestDTOValidationContract;

final class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // RequestDTOFactory
        $this->app->bind(
            CreateUserRequestDTOFactoryContract::class,
            CreateUserRequestDTOFactory::class
        );

        // RequestDTOValidation
        $this->app->bind(
            CreateUserRequestDTOValidationContract::class,
            CreateUserRequestDTOValidation::class
        );

        // Mappers
        $this->app->bind(
            CreateUserMapperContract::class,
            CreateUserMapper::class
        );

        // Services
        $this->app->bind(
            CreateUserServiceContract::class,
            CreateUserService::class
        );

        // UseCases
        $this->app->bind(
            CreateUserUseCaseContract::class,
            CreateUserUseCase::class
        );

        // Repository
        $this->app->bind(
            UserRepositoryContract::class,
            UserRepository::class
        );
    }
}