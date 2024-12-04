<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\RequestDTOValidation;

use App\User\Presentation\API\CreateUserAPI\Templates\RequestTemplate;
use Illuminate\Support\Facades\Validator;

final readonly class CreateUserRequestDTOValidation implements CreateUserRequestDTOValidationContract
{

    public function validate(RequestTemplate $data): void
    {
        $validation = Validator::make($data->toArray(), [
            'name' => ['required', 'string'],
            'vkid' => ['required', 'integer', 'unique:users,vkid'],
        ]);

        if ($validation->fails()) {
            throw new CreateUserRequestDTOValidationException($validation->messages()->toJson());
        }
    }
}