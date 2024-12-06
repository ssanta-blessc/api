<?php

declare(strict_types=1);

namespace App\User\Presentation\API\CreateUserAPI\Templates;

use App\User\Presentation\API\Templates\ResponseBaseTemplate;

final class ResponseTemplate extends ResponseBaseTemplate
{
    public function __construct(
        private readonly bool $success,
        private readonly string $info,
        private readonly int $status = 200,
    ) {
        parent::__construct();
        $this->responseArray['data'] = [
            'success' => $this->success,
            'status' => $this->status,
            'info' => json_decode($this->info, true),
        ];
    }

}