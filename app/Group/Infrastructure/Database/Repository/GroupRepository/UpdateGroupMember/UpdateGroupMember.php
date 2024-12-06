<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\UpdateGroupMember;

use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Infrastructure\Database\Models\GroupMember as GroupMemberModel;

final readonly class UpdateGroupMember
{
    public function updateGroupMember(GroupMember $groupMember): GroupMember
    {
        $updateData = collect([
            'wish' => $groupMember->getWish(),
            'admin' => $groupMember->getAdmin(),
            'recipient_id' => $groupMember->getRecipientId(),
        ])->filter(fn($value) => !is_null($value))->toArray();

        if (empty($updateData)) {
            return $groupMember;
        }

        $groupMemberModel = GroupMemberModel::where('user_id', $groupMember->getUserId())
            ->where('group_id', $groupMember->getGroupId())
            ->firstOrFail();
        $groupMemberModel->update($updateData);

        return new GroupMember(
            $groupMemberModel->user_id,
            $groupMemberModel->group_id,
            $groupMemberModel->wish,
            $groupMemberModel->id,
            $groupMemberModel->admin,
            $groupMemberModel->recipient_id,
        );
    }
}