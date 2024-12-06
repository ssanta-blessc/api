<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Action;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\DTO\GetGroupMembers\GetGroupMembersDTO;
use App\Group\Core\Domain\DTO\UpdateGroupMember\UpdateGroupMemberDTO;
use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Core\Domain\ValueObject\AssignSantaValueObject\AssignSantaValueObject;
use App\Group\Infrastructure\Database\Repository\RepositoryException;

final readonly class AssignSantaActionUseCase
{
    public function __construct(
        private GroupRepositoryContract $groupRepository,
    ) {
    }

    /**
     * @throws ActionUseCaseException
     */
    public function execute(AssignSantaValueObject $valueObject): void
    {
        try {
            $members = $this->groupRepository->getGroupMembers(
                new GetGroupMembersDTO($valueObject->getGroupId())
            );
        } catch (RepositoryException) {
            throw new ActionUseCaseException("Members not found", 404);
        }

        $membersIds = $members->map(fn(GroupMember $groupMember) => $groupMember->getUserId())->shuffle()->toArray();

        try {
            for ($i = 0; $i < count($membersIds); $i++) {
                $this->groupRepository->updateGroupMember(
                    new UpdateGroupMemberDTO(
                        $membersIds[$i],
                        $valueObject->getGroupId(),
                        null, null, null,
                        $i === (count($membersIds) - 1) ? $membersIds[0] : $membersIds[$i]
                    )
                );
            }
        } catch (RepositoryException) {
            throw new ActionUseCaseException("Member not found", 404);
        }
    }
}