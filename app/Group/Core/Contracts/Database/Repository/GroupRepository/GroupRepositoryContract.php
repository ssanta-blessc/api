<?php

declare(strict_types=1);

namespace App\Group\Core\Contracts\Database\Repository\GroupRepository;

use App\Group\Core\Domain\DTO\CreateGroupDTO\CreateGroupDTO;
use App\Group\Core\Domain\DTO\CreateGroupDTO\GroupDTO;
use App\Group\Core\Domain\DTO\CreateGroupMember\CreateGroupMemberDTO;
use App\Group\Core\Domain\DTO\GetGroupById\GetGroupByIdDTO;
use App\Group\Core\Domain\DTO\GetGroupByJoinCode\GetGroupByJoinCodeDTO;
use App\Group\Core\Domain\DTO\GetGroupMemberById\GetGroupMemberByIdDTO;
use App\Group\Core\Domain\DTO\GetGroupMemberByIdWithNameVKID\GetGroupMemberByIdWithNameVKIDDTO;
use App\Group\Core\Domain\DTO\GetGroupMemberByIdWithNameVKID\GroupMemberWithNameVKIDDTO;
use App\Group\Core\Domain\DTO\GetGroupMembers\GetGroupMembersDTO;
use App\Group\Core\Domain\DTO\UpdateGroupDTO\UpdateGroupDTO;
use App\Group\Core\Domain\DTO\UpdateGroupMember\UpdateGroupMemberDTO;
use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Infrastructure\Database\Repository\GroupRepository\GroupRepositoryException;
use Illuminate\Support\Collection;

interface GroupRepositoryContract
{

    public function createGroup(CreateGroupDTO $DTO): Group;

    /**
     * @throws GroupRepositoryException
     */
    public function getGroupMembers(GetGroupMembersDTO $DTO): Collection;

    /**
     * @throws GroupRepositoryException
     */
    public function getGroupMemberById(GetGroupMemberByIdDTO $DTO): GroupMember;

    /**
     * @throws GroupRepositoryException
     */
    public function getGroupByJoinCode(GetGroupByJoinCodeDTO $DTO): Group;

    public function createGroupMember(CreateGroupMemberDTO $DTO): GroupMember;

    /**
     * @throws GroupRepositoryException
     */
    public function updateGroupMember(UpdateGroupMemberDTO $DTO): GroupMember;

    /**
     * @throws GroupRepositoryException
     */
    public function updateGroup(UpdateGroupDTO $DTO): Group;

    /**
     * @throws GroupRepositoryException
     */
    public function getGroupById(GetGroupByIdDTO $DTO): Group;

    /**
     * @throws GroupRepositoryException
     */
    public function getGroupMemberByIdWithNameVKID(
        GetGroupMemberByIdWithNameVKIDDTO $DTO
    ): GroupMemberWithNameVKIDDTO;


}