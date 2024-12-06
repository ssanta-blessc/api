<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Action;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\DTO\CreateGroupDTO\CreateGroupDTO;
use App\Group\Core\Domain\DTO\GetGroupByJoinCode\GetGroupByJoinCodeDTO;
use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Core\Domain\ValueObject\CreateGroupValueObject\CreateGroupValueObject;
use App\Group\Infrastructure\Database\Repository\RepositoryException;
use Illuminate\Support\Str;

final readonly class CreateGroupActionUseCase
{

    public function __construct(
        private GroupRepositoryContract $groupRepository,
    ) {
    }
    
    public function execute(CreateGroupValueObject $valueObject): Group
    {
        return $this->groupRepository->createGroup(
            new CreateGroupDTO(
                $valueObject->getName(), $this->createJoinCode(),
                false
            )
        );
    }

    private function createJoinCode(): string
    {
        $joinCode = Str::random();

        try {
            $this->groupRepository->getGroupByJoinCode(new GetGroupByJoinCodeDTO($joinCode));
        } catch (RepositoryException) {
            return $joinCode;
        }

        return $this->createJoinCode();
    }

}