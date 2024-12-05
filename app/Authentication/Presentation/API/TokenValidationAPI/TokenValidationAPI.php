<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI;


use App\Authentication\Application\Services\TokenValidationService\TokenValidationServiceContract;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOFactory\TokenValidationRequestDTOFactoryContract;
use App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation\TokenValidationRequestDTOValidationException;
use App\Authentication\Presentation\API\TokenValidationAPI\Templates\RequestTemplate;
use App\Authentication\Presentation\API\TokenValidationAPI\Templates\ResponseTemplate;
use Illuminate\Http\JsonResponse;

final readonly class TokenValidationAPI
{
    public function __construct(
        private TokenValidationServiceContract $tokenValidationService,
        private TokenValidationRequestDTOFactoryContract $tokenValidationRequestDTOFactory,
    ) {
    }


    private function validation(RequestTemplate $requestTemplate): JsonResponse
    {
        try {
            $tokenValidationResponseDTO = $this->tokenValidationService->validate(
                $this->tokenValidationRequestDTOFactory->create($requestTemplate)
            );
        } catch (TokenValidationRequestDTOValidationException $e) {
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
                $tokenValidationResponseDTO->getSuccess(),
                json_encode(
                    array_filter([
                        "message" => $tokenValidationResponseDTO->getMessage(),
                    ], function ($value) {
                        return $value !== null;
                    })
                ),
                $tokenValidationResponseDTO->getStatus()
            ))->toJson()
        );
    }


    public function validationFromArray(array $data): JsonResponse
    {
        return $this->validation(RequestTemplate::fromArray($data));
    }

    public function validationFromData(mixed $token = null): JsonResponse
    {
        return $this->validation(new RequestTemplate($token));
    }

    public function validationFromTemplate(RequestTemplate $template): JsonResponse
    {
        return $this->validation($template);
    }
}