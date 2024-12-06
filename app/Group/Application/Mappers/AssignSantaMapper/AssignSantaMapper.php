<?php

declare(strict_types=1);

namespace App\Group\Application\Mappers\AssignSantaMapper;

use App\Group\Application\ResponseDTO\AssignSantaResponseDTO;
use App\Group\Core\Domain\ValueObject\AssignSantaValueObject\AssignSantaRequestValueObject;
use App\Group\Core\Domain\ValueObject\AssignSantaValueObject\AssignSantaResponseValueObject;
use App\Group\Core\Domain\ValueObject\CloseGroupValueObject\CloseGroupRequestValueObject;
use App\Group\Core\Domain\ValueObject\CloseGroupValueObject\CloseGroupResponseValueObject;

final readonly class AssignSantaMapper implements AssignSantaMapperContract
{
    public function fromAssignSantaResponseValueObject(
        AssignSantaResponseValueObject $assignSantaResponseValueObject
    ): AssignSantaResponseDTO {
        return new AssignSantaResponseDTO(
            $assignSantaResponseValueObject->getSuccess(),
            $assignSantaResponseValueObject->getMessage(),
            $assignSantaResponseValueObject->getStatus()
        );
    }

    public function fromCloseGroupResponseValueObject(
        CloseGroupResponseValueObject $closeGroupResponseValueObject
    ): AssignSantaResponseDTO {
        return new AssignSantaResponseDTO(
            $closeGroupResponseValueObject->getSuccess(),
            $closeGroupResponseValueObject->getMessage(),
            $closeGroupResponseValueObject->getStatus()
        );
    }
    
    public function toAssignSantaRequestValueObject(int $groupId): AssignSantaRequestValueObject
    {
        return new AssignSantaRequestValueObject($groupId);
    }

    public function toCloseGroupRequestValueObject(int $groupId): CloseGroupRequestValueObject
    {
        return new CloseGroupRequestValueObject($groupId);
    }


}