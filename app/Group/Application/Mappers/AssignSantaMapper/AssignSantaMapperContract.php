<?php

declare(strict_types=1);

namespace App\Group\Application\Mappers\AssignSantaMapper;

use App\Group\Application\ResponseDTO\AssignSantaResponseDTO;
use App\Group\Core\Domain\ValueObject\AssignSantaValueObject\AssignSantaRequestValueObject;
use App\Group\Core\Domain\ValueObject\AssignSantaValueObject\AssignSantaResponseValueObject;
use App\Group\Core\Domain\ValueObject\CloseGroupValueObject\CloseGroupRequestValueObject;
use App\Group\Core\Domain\ValueObject\CloseGroupValueObject\CloseGroupResponseValueObject;

interface AssignSantaMapperContract
{
    public function toAssignSantaRequestValueObject(
        int $groupId,
    ): AssignSantaRequestValueObject;

    public function toCloseGroupRequestValueObject(
        int $groupId,
    ): CloseGroupRequestValueObject;

    public function fromAssignSantaResponseValueObject(
        AssignSantaResponseValueObject $assignSantaResponseValueObject
    ): AssignSantaResponseDTO;

    public function fromCloseGroupResponseValueObject(
        CloseGroupResponseValueObject $closeGroupResponseValueObject
    ): AssignSantaResponseDTO;

}