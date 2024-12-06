<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Workflow\StartGameWorkflowUseCase;

use App\Group\Core\Domain\QueryObject\StartGameQueryObject\StartGameRequestQueryObject;
use App\Group\Core\Domain\QueryObject\StartGameQueryObject\StartGameResponseQueryObject;

interface StartGameWorkflowUseCaseContract
{
    public function __invoke(StartGameRequestQueryObject $createGroupRequest): StartGameResponseQueryObject;
}