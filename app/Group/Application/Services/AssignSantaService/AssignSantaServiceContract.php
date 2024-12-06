<?php

declare(strict_types=1);

namespace App\Group\Application\Services\AssignSantaService;

use App\Group\Application\RequestDTO\AssignSantaRequestDTO;
use App\Group\Application\ResponseDTO\AssignSantaResponseDTO;

interface AssignSantaServiceContract
{
    public function assignSanta(AssignSantaRequestDTO $assignSantaRequestDTO): AssignSantaResponseDTO;
}