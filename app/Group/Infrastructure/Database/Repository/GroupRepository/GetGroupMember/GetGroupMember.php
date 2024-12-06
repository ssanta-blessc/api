<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupMember;

use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Infrastructure\Database\Models\GroupMember as GroupMemberModel;

final readonly class GetGroupMember
{
    public function getGroupMember(GroupMember $groupMember): GroupMember
    {
        $groupMemberModel = GroupMemberModel::where('group_id', $groupMember->getGroupId())
            ->where('user_id', $groupMember->getUserId())
            ->firstOrFail();

        return new GroupMember(
            $groupMemberModel->user_id,
            $groupMemberModel->group_id,
            $groupMemberModel->wish,
            $groupMemberModel->id,
            $groupMemberModel->admin,
            $groupMemberModel->recipient_id
        );
    }
}