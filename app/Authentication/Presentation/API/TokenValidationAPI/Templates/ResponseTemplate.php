<?php

declare(strict_types=1);

namespace App\Authentication\Presentation\API\TokenValidationAPI\Templates;

use App\Authentication\Presentation\Templates\ResponseBaseTemplate;

final  class ResponseTemplate extends ResponseBaseTemplate
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