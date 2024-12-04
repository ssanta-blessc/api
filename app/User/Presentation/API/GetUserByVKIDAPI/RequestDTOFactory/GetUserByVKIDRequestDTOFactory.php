<?php

declare(strict_types=1);

namespace App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOFactory;

use App\User\Application\RequestDTO\GetUserByVKIDRequestDTO;
use App\User\Presentation\API\GetUserByVKIDAPI\RequestDTOValidation\GetUserByVKIDRequestDTOValidationContract;
use App\User\Presentation\API\GetUserByVKIDAPI\Templates\RequestTemplate;

final readonly class GetUserByVKIDRequestDTOFactory implements GetUserByVKIDRequestDTOFactoryContract
{
    public function __construct(private GetUserByVKIDRequestDTOValidationContract $validation)
    {
    }

    public function create(RequestTemplate $data): GetUserByVKIDRequestDTO
    {
        $this->validation->validate($data);
        return new GetUserByVKIDRequestDTO(
            (int)$data->vkid
        );
    }
}