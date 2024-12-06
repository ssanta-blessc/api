<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\UpdateGroup;

use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Infrastructure\Database\Models\Group as GroupModel;

final readonly class UpdateGroup
{
    public function updateGroup(Group $group): Group
    {
        $updateData = collect([
            'name' => $group->getName(),
            'join_code' => $group->getJoinCode(),
            'closed' => $group->getClosed(),
        ])->filter(fn($value) => !is_null($value))->toArray();

        if (empty($updateData)) {
            return $group;
        }

        $groupModel = GroupModel::findOrFail($group->getId());
        $groupModel->update($updateData);

        return new Group(
            $groupModel->join_code,
            $groupModel->id,
            $groupModel->name,
            $groupModel->closed
        );
    }
}