<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\VKAuthenticationAPI;

use App\Authentication\Application\Services\VKAuthenticationService\VKAuthenticationServiceContract;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOFactory\VKAuthenticationRequestDTOFactoryContract;
use App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation\VKAuthenticationRequestDTOValidationException;
use App\Authentication\Presentation\API\VKAuthenticationAPI\Templates\RequestTemplate;
use App\Authentication\Presentation\API\VKAuthenticationAPI\Templates\ResponseTemplate;
use Illuminate\Http\JsonResponse;

final readonly class VKAuthenticationAPI
{
    public function __construct(
        private VKAuthenticationServiceContract $VKAuthenticationService,
        private VKAuthenticationRequestDTOFactoryContract $VKAuthenticationRequestDTOFactory,
    ) {
    }


    private function authentication(RequestTemplate $requestTemplate): JsonResponse
    {
        try {
            $VKAuthenticationResponseDTO = $this->VKAuthenticationService->authenticate(
                $this->VKAuthenticationRequestDTOFactory->create($requestTemplate)
            );
        } catch (VKAuthenticationRequestDTOValidationException $e) {
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
                $VKAuthenticationResponseDTO->getSuccess(),
                json_encode(
                    array_filter([
                        "token" => $VKAuthenticationResponseDTO->getToken(),
                        "message" => $VKAuthenticationResponseDTO->getMessage(),
                    ], function ($value) {
                        return $value !== null;
                    })
                ),
                $VKAuthenticationResponseDTO->getStatus()
            ))->toJson()
        );
    }


    public function authenticationFromArray(array $data): JsonResponse
    {
        return $this->authentication(RequestTemplate::fromArray($data));
    }

    public function authenticationFromData(mixed $vkid = null): JsonResponse
    {
        return $this->authentication(new RequestTemplate($vkid));
    }

    public function authenticationFromTemplate(RequestTemplate $template): JsonResponse
    {
        return $this->authentication($template);
    }
}