<?php

declare(strict_types=1);

namespace App\User\Presentation\API\GetUserByVKIDAPI;

use App\User\Application\Service\GetUserByVKIDService\GetUserByVKIDServiceContract;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOFactory\GetUserByVKIDRequestDTOFactoryContract;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation\GetUserByVKIDRequestDTOValidationException;
use App\User\Presentation\API\GetUserByVKIDAPI\Templates\RequestTemplate;
use App\User\Presentation\API\GetUserByVKIDAPI\Templates\ResponseTemplate;
use Illuminate\Http\JsonResponse;

final readonly class GetUserByVKIDAPI
{
    public function __construct(
        private GetUserByVKIDServiceContract $getUserByVKIDService,
        private GetUserByVKIDRequestDTOFactoryContract $getUserByVKIDRequestDTOFactory,
    ) {
    }


    private function getByVKID(RequestTemplate $requestTemplate): JsonResponse
    {
        try {
            $GetUserByVKIDResponseDTO = $this->getUserByVKIDService->getByVKID(
                $this->getUserByVKIDRequestDTOFactory->create($requestTemplate)
            );
        } catch (GetUserByVKIDRequestDTOValidationException $e) {
            return response()->json()->setJson(
                (new ResponseTemplate(
                    false,
                    json_encode(["errors" => $e->getMessage()]),
                    422
                ))->toJson()
            );
        }

        return response()->json()->setJson(
            (new ResponseTemplate(
                $GetUserByVKIDResponseDTO->getSuccess(),
                json_encode(
                    array_filter([
                        "id" => $GetUserByVKIDResponseDTO->getId(),
                        "name" => $GetUserByVKIDResponseDTO->getName(),
                        "vkid" => $GetUserByVKIDResponseDTO->getVkid(),
                        "message" => $GetUserByVKIDResponseDTO->getMessage(),
                    ], function ($value) {
                        return $value !== null;
                    })
                ),
                $GetUserByVKIDResponseDTO->getStatus()
            ))->toJson()
        );
    }


    public function getByVKIDFromArray(array $data): JsonResponse
    {
        return $this->getByVKID(RequestTemplate::fromArray($data));
    }

    public function getByVKIDFromData(mixed $vkid = null): JsonResponse
    {
        return $this->getByVKID(new RequestTemplate($vkid));
    }

    public function getByVKIDFromTemplate(RequestTemplate $template): JsonResponse
    {
        return $this->getByVKID($template);
    }
}