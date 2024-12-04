<?php

declare(strict_types=1);

namespace App\User\Application\Service\CreateUserService;

use App\User\Application\Mapper\CreateUserMapper\CreateUserMapperContract;
use App\User\Application\RequestDTO\CreateUserRequestDTO;
use App\User\Application\ResponseDTO\CreateUserResponseDTO;
use App\User\Core\UseCases\CreateUserUseCase\CreateUserUseCaseContract;

final readonly class CreateUserService implements CreateUserServiceContract
{
    public function __construct(
        private CreateUserUseCaseContract $createUserUseCase,
        private CreateUserMapperContract $createUserMapper,
    ) {
    }

    public function create(CreateUserRequestDTO $createUserRequestDTO): CreateUserResponseDTO
    {
        return $this->createUserMapper->toResponseDTO(
            $this->createUserUseCase->createUser(
                $this->createUserMapper->toNameValueObject(
                    $createUserRequestDTO
                )
            )
        );
    }
}