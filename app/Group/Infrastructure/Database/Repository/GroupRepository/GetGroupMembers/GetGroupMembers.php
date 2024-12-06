<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupMembers;

use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Infrastructure\Database\Models\GroupMember as GroupMemberModel;
use Illuminate\Support\Collection;

final readonly class GetGroupMembers
{
    public function getGroupMembers(Group $group): Collection
    {
        return GroupMemberModel::where('group_id', $group->getId())->get()->map(function (GroupMemberModel $member) {
            return new GroupMember(
                $member->user_id,
                $member->group_id,
                $member->wish,
                $member->id,
                $member->admin,
                $member->recipient_id
            );
        });
    }
}