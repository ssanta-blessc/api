<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Workflow\StartGameWorkflowUseCase;

use App\Group\Core\Domain\QueryObject\StartGameQueryObject\StartGameRequestQueryObject;
use App\Group\Core\Domain\QueryObject\StartGameQueryObject\StartGameResponseQueryObject;
use App\Group\Core\UseCases\Action\AssignSantaActionUseCase;

final readonly class CreateGroupWorkflowUseCase implements CreateGroupWorkflowUseCaseContract
{

    public function __construct(
        private AssignSantaActionUseCase $assignSantaUseCase,
    ) {
    }


    public function __invoke(StartGameRequestQueryObject $createGroupRequestQueryQO): StartGameResponseQueryObject
    {
    }


}