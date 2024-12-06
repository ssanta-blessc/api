<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Action;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\DTO\UpdateGroupDTO\UpdateGroupDTO;
use App\Group\Core\Domain\ValueObject\CloseGroupValueObject\CloseGroupValueObject;
use App\Group\Infrastructure\Database\Repository\RepositoryException;

final readonly class CloseGroupActionUseCase
{
    public function __construct(
        private GroupRepositoryContract $groupRepository
    ) {
    }

    /**
     * @throws ActionUseCaseException
     */
    public function execute(CloseGroupValueObject $valueObject): void
    {
        try {
            $this->groupRepository->updateGroup(
                new UpdateGroupDTO(
                    $valueObject->getGroupId(),
                    true
                )
            );
        } catch (RepositoryException) {
            throw new ActionUseCaseException("Group not found", 404);
        }
    }
}