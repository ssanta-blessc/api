<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Workflow\CreateGroupWorkflowUseCase;

use App\Group\Core\Domain\QueryObject\CreateGroupQueryObject\CreateGroupRequestQueryObject;
use App\Group\Core\Domain\QueryObject\CreateGroupQueryObject\CreateGroupResponseQueryObject;

interface CreateGroupWorkflowUseCaseContract
{
    public function execute(CreateGroupRequestQueryObject $queryObject): CreateGroupResponseQueryObject;
}