<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\VKAuthenticationAPI\RequestDTOValidation;

use App\Authentication\Presentation\API\VKAuthenticationAPI\Templates\RequestTemplate;
use Illuminate\Support\Facades\Validator;

final readonly class VKAuthenticationRequestDTOValidation implements VKAuthenticationRequestDTOValidationContract
{

    public function validate(RequestTemplate $data): void
    {
        $validation = Validator::make($data->toArray(), [
            'code' => ['required', 'string'],
        ]);

        if ($validation->fails()) {
            throw new VKAuthenticationRequestDTOValidationException($validation->messages()->toJson());
        }
    }
}