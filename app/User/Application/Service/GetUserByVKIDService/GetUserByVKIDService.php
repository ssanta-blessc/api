<?php

declare(strict_types=1);

namespace App\User\Application\Service\GetUserByVKIDService;

use App\User\Application\Mapper\GetUserByVKIDMapper\GetUserByVKIDMapperContract;
use App\User\Application\RequestDTO\GetUserByVKIDRequestDTO;
use App\User\Application\ResponseDTO\GetUserByVKIDResponseDTO;
use App\User\Core\UseCases\GetUserByVKIDUseCase\GetUserByVKIDUseCaseContract;

final readonly class GetUserByVKIDService implements GetUserByVKIDServiceContract
{

    public function __construct(
        private GetUserByVKIDUseCaseContract $getUserByVKIDUseCase,
        private GetUserByVKIDMapperContract $getUserByVKIDMapper
    ) {
    }

    public function getByVKID(GetUserByVKIDRequestDTO $DTO): GetUserByVKIDResponseDTO
    {
        return $this->getUserByVKIDMapper->toResponseDTO(
            $this->getUserByVKIDUseCase->getByVKID(
                $this->getUserByVKIDMapper->toRequestValueObject($DTO)
            )
        );
    }
}