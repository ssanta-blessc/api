<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\Templates;

use App\User\Presentation\API\Templates\ResponseBaseTemplate;

final class ResponseTemplate extends ResponseBaseTemplate
{
    public function __construct(
        private readonly bool $success,
        private readonly string $message
    ) {
        parent::__construct();
        $this->responseArray['data'] = [
            'success' => $this->success,
            'message' => json_decode($this->message, true),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['success'],
            $data['message']
        );
    }

}