<?php

declare(strict_types=1);

namespace App\Group\Core\UseCases\Action;

use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\DTO\GetGroupMemberByIdWithNameVKID\GetGroupMemberByIdWithNameVKIDDTO;
use App\Group\Core\Domain\ValueObject\GetMemberRecipientValueObject\GetMemberRecipientValueObject;
use App\Group\Core\Domain\ValueObject\GetMemberRecipientValueObject\MemberRecipientValueObject;
use App\Group\Infrastructure\Database\Repository\RepositoryException;

final readonly class GetMemberRecipientActionUseCase
{
    public function __construct(
        private GroupRepositoryContract $groupRepository,
    ) {
    }

    /**
     * @throws ActionUseCaseException
     */
    public function execute(
        GetMemberRecipientValueObject $valueObject
    ): MemberRecipientValueObject {
        // Check is member

        try {
            $recipient = $this->groupRepository->getGroupMemberByIdWithNameVKID(
                new GetGroupMemberByIdWithNameVKIDDTO(
                    $valueObject->getUserId(),
                    $valueObject->getGroupId()
                )
            );
        } catch (RepositoryException) {
            throw new ActionUseCaseException("Recipient not found", 404);
        }

        return new MemberRecipientValueObject(
            $recipient->getName(),
            $recipient->getWish(),
            $recipient->getVkid()
        );
    }
}