<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Database\Repository\GroupRepository\CreateGroup;


use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Infrastructure\Database\Models\Group as GroupModel;

final readonly class CreateGroup
{

    public function createGroup(Group $group): Group
    {
        $newGroup = new GroupModel([
            'join_code' => $group->getJoinCode(),
            'name' => $group->getName(),
            'closed' => $group->getClosed()
        ]);

        $newGroup->save();

        return new Group(
            $newGroup->join_code,
            $newGroup->id,
            $newGroup->name,
            $newGroup->closed
        );
    }
}