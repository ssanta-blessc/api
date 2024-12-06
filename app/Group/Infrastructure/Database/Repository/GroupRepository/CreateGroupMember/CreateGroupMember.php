<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\CreateGroupMember;

use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Infrastructure\Database\Models\GroupMember as GroupMemberModel;

final readonly class CreateGroupMember
{
    public function createGroupMember(GroupMember $groupMember): GroupMember
    {
        $groupMemberModel = new GroupMemberModel([
            'user_id' => $groupMember->getUserId(),
            'group_id' => $groupMember->getGroupId(),
            'wish' => $groupMember->getWish(),
            'admin' => $groupMember->getAdmin(),
            'recipient_id' => $groupMember->getRecipientId(),
        ]);
        $groupMemberModel->save();

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