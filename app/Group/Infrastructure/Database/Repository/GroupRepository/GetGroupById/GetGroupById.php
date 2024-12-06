<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupById;

use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Infrastructure\Database\Models\Group as GroupModel;

final readonly class GetGroupById
{
    public function getGroupById(Group $group): Group
    {
        $groupModel = GroupModel::findOrFail($group->getId());

        return new Group(
            $groupModel->join_code,
            $groupModel->id,
            $groupModel->name,
            $groupModel->closed
        );
    }
}