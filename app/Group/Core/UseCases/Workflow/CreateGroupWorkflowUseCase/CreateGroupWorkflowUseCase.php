<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Workflow\CreateGroupWorkflowUseCase;

use App\Group\Core\Domain\QueryObject\CreateGroupQueryObject\CreateGroupRequestQueryObject;
use App\Group\Core\Domain\QueryObject\CreateGroupQueryObject\CreateGroupResponseQueryObject;
use App\Group\Core\Domain\ValueObject\AddMemberToGroupValueObject\AddMemberToGroupValueObject;
use App\Group\Core\Domain\ValueObject\CreateGroupValueObject\CreateGroupValueObject;
use App\Group\Core\UseCases\Action\ActionUseCaseException;
use App\Group\Core\UseCases\Action\AddMemberToGroupActionUseCase;
use App\Group\Core\UseCases\Action\CreateGroupActionUseCase;

final readonly class CreateGroupWorkflowUseCase implements CreateGroupWorkflowUseCaseContract
{
    public function __construct(
        private CreateGroupActionUseCase $createGroupActionUseCase,
        private AddMemberToGroupActionUseCase $addMemberToGroupActionUseCase,
    ) {
    }

    public function execute(CreateGroupRequestQueryObject $queryObject): CreateGroupResponseQueryObject
    {
        $group = $this->createGroupActionUseCase->execute(
            new CreateGroupValueObject(
                $queryObject->getName()
            )
        );

        try {
            $this->addMemberToGroupActionUseCase->execute(
                new AddMemberToGroupValueObject($queryObject->getUserId(), $group->getId(), true)
            );
        } catch (ActionUseCaseException $exception) {
            return new CreateGroupResponseQueryObject(false, $exception->getMessage(), $exception->getCode());
        }

        return new CreateGroupResponseQueryObject(true, "OK", 200, $group->getJoinCode());
    }


}