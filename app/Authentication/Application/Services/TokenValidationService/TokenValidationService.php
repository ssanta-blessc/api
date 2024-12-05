<?php

declare(strict_types=1);

namespace App\Authentication\Application\Services\TokenValidationService;

use App\Authentication\Application\Mappers\TokenValidationMapper\TokenValidationMapperContract;
use App\Authentication\Application\RequestDTO\TokenValidationRequestDTO;
use App\Authentication\Application\ResponseDTO\TokenValidationResponseDTO;
use App\Authentication\Core\UseCases\TokenValidationUseCase\TokenValidationUseCaseContract;

final readonly class TokenValidationService implements TokenValidationServiceContract
{
    public function __construct(
        private TokenValidationMapperContract $tokenValidationMapper,
        private TokenValidationUseCaseContract $tokenValidationUseCase
    ) {
    }

    public function validate(TokenValidationRequestDTO $tokenValidationRequestDTO): TokenValidationResponseDTO
    {
        return $this->tokenValidationMapper->toTokenValidationResponseDTO(
            $this->tokenValidationUseCase->validate(
                $this->tokenValidationMapper->toTokenValidationRequestValueObject($tokenValidationRequestDTO)
            )
        );
    }
}