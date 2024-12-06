<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Infrastructure\Database\Repository\GroupRepository\CreateGroup\CreateGroup;
use App\Group\Infrastructure\Database\Repository\GroupRepository\CreateGroupMember\CreateGroupMember;
use App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupById\GetGroupById;
use App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupByJoinCode\GetGroupByJoinCode;
use App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupMember\GetGroupMember;
use App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupMembers\GetGroupMembers;
use App\Group\Infrastructure\Database\Repository\GroupRepository\UpdateGroup\UpdateGroup;
use App\Group\Infrastructure\Database\Repository\GroupRepository\UpdateGroupMember\UpdateGroupMember;
use Exception;
use Illuminate\Support\Collection;

final readonly class GroupRepository implements GroupRepositoryContract
{
    public function __construct(
        private CreateGroup $createGroup,
        private GetGroupMembers $getGroupMembers,
        private GetGroupMember $getGroupMember,
        private GetGroupByJoinCode $getGroupByJoinCode,
        private CreateGroupMember $createGroupMember,
        private UpdateGroupMember $updateGroupMember,
        private UpdateGroup $updateGroup,
        private GetGroupById $getGroupById

    ) {
    }

    public function getGroupMembers(Group $group): Collection
    {
        try {
            return $this->getGroupMembers->getGroupMembers($group);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function createGroup(Group $group): Group
    {
        try {
            return $this->createGroup->createGroup($group);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function getGroupMember(GroupMember $groupMember): GroupMember
    {
        try {
            return $this->getGroupMember->getGroupMember($groupMember);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function getGroupByJoinCode(Group $group): Group
    {
        try {
            return $this->getGroupByJoinCode->getGroupByJoinCode($group);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function createGroupMember(GroupMember $groupMember): GroupMember
    {
        try {
            return $this->createGroupMember->createGroupMember($groupMember);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function updateGroupMember(GroupMember $groupMember): GroupMember
    {
        try {
            return $this->updateGroupMember->updateGroupMember($groupMember);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function updateGroup(Group $group): Group
    {
        try {
            return $this->updateGroup->updateGroup($group);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }

    public function getGroupById(Group $group): Group
    {
        try {
            return $this->getGroupById->getGroupById($group);
        } catch (Exception $e) {
            throw new GroupRepositoryException($e->getMessage());
        }
    }


}