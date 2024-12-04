<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI;

use App\User\Application\Service\CreateUserService\CreateUserServiceContract;
use App\User\Presentation\API\CreateUserAPI\RequestDTOFactory\CreateUserRequestDTOFactoryContract;
use App\User\Presentation\API\CreateUserAPI\RequestDTOValidation\CreateUserRequestDTOValidationException;
use App\User\Presentation\API\CreateUserAPI\Templates\RequestTemplate;
use App\User\Presentation\API\CreateUserAPI\Templates\ResponseTemplate;
use Illuminate\Http\JsonResponse;

final readonly class CreateUserAPI
{
    public function __construct(
        private CreateUserServiceContract $createUserService,
        private CreateUserRequestDTOFactoryContract $createUserRequestDTOFactory,
    ) {
    }


    private function create(RequestTemplate $requestTemplate): JsonResponse
    {
        try {
            $CreateUserResponseDTO = $this->createUserService->create(
                $this->createUserRequestDTOFactory->create($requestTemplate)
            );
        } catch (CreateUserRequestDTOValidationException $e) {
            return response()->json()->setJson(
                (new ResponseTemplate(
                    false,
                    $e->getMessage(),
                    422
                ))->toJson()
            );
        }

        return response()->json()->setJson(
            (new ResponseTemplate(
                $CreateUserResponseDTO->getSuccess(),
                $CreateUserResponseDTO->getMessage(),
                $CreateUserResponseDTO->getStatus()
            ))->toJson()
        );
    }


    public function createFromArray(array $data): JsonResponse
    {
        return $this->create(RequestTemplate::fromArray($data));
    }

    public function createFromData(?string $name = null): JsonResponse
    {
        return $this->create(new RequestTemplate($name));
    }

    public function createFromTemplate(RequestTemplate $template): JsonResponse
    {
        return $this->create($template);
    }
}