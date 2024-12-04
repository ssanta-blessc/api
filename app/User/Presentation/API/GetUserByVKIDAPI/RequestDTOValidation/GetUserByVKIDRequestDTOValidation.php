<?php

declare(strict_types=1);

namespace App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation;

use App\User\Presentation\API\GetUserByVKIDAPI\Templates\RequestTemplate;
use Illuminate\Support\Facades\Validator;

final readonly class GetUserByVKIDRequestDTOValidation implements GetUserByVKIDRequestDTOValidationContract
{

    public function validate(RequestTemplate $data): void
    {
        $validation = Validator::make($data->toArray(), [
            'vkid' => ['required', 'integer'],
        ]);

        if ($validation->fails()) {
            throw new GetUserByVKIDRequestDTOValidationException($validation->messages()->toJson());
        }
    }
}