<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\GetGroupByJoinCode;

use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Infrastructure\Database\Models\Group as GroupModel;

final readonly class GetGroupByJoinCode
{
    public function getGroupByJoinCode(Group $group): Group
    {
        $groupModel = GroupModel::where('join_code', $group->getJoinCode())->firstOrFail();

        return new Group(
            $groupModel->join_code,
            $groupModel->id,
            $groupModel->name,
            $groupModel->closed
        );
    }
}