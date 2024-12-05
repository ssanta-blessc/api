<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI\RequestDTOValidation;

use App\Authentication\Presentation\API\TokenValidationAPI\Templates\RequestTemplate;
use Illuminate\Support\Facades\Validator;

final readonly class TokenValidationRequestDTOValidation implements TokenValidationRequestDTOValidationContract
{
    public function validate(RequestTemplate $requestTemplate): void
    {
        $validation = Validator::make($requestTemplate->toArray(), [
            'token' => ['required', 'string'],
        ]);

        if ($validation->fails()) {
            throw new TokenValidationRequestDTOValidationException($validation->messages()->toJson());
        }
    }

}