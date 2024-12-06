<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Action;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\DTO\CreateGroupMember\CreateGroupMemberDTO;
use App\Group\Core\Domain\DTO\GetGroupById\GetGroupByIdDTO;
use App\Group\Core\Domain\ValueObject\AddMemberToGroupValueObject\AddMemberToGroupValueObject;
use App\Group\Infrastructure\Database\Repository\RepositoryException;

final readonly class AddMemberToGroupActionUseCase
{

    public function __construct(
        private GroupRepositoryContract $groupRepository,
    ) {
    }

    /**
     * @throws ActionUseCaseException
     */
    public function execute(AddMemberToGroupValueObject $valueObject): void
    {
        try {
            $this->groupRepository->getGroupById(new GetGroupByIdDTO($valueObject->getGroupId()));
        } catch (RepositoryException) {
            throw new ActionUseCaseException("Group not found", 404);
        }


        $this->groupRepository->createGroupMember(
            new CreateGroupMemberDTO(
                $valueObject->getUserId(),
                $valueObject->getGroupId(),
                $valueObject->isAdmin(),
                $valueObject->getRecipientId()
            )
        );
    }
}