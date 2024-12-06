<?php

declare(strict_types=1);

namespace App\Group\Application\Services\AssignSantaService;

use App\Group\Application\Mappers\AssignSantaMapper\AssignSantaMapperContract;
use App\Group\Application\RequestDTO\AssignSantaRequestDTO;
use App\Group\Application\ResponseDTO\AssignSantaResponseDTO;
use App\Group\Core\Contracts\Database\Repository\GroupRepository\GroupRepositoryContract;
use App\Group\Core\Domain\Entity\Group\Group;
use App\Group\Core\Domain\Entity\GroupMember\GroupMember;
use App\Group\Core\UseCases\Action\AssignSantaUseCase\AssignSantaUseCaseContract;
use App\Group\Core\UseCases\Action\CloseGroupUseCase\CloseGroupUseCaseContract;
use App\Group\Infrastructure\Database\Repository\RepositoryException;
use Exception;

final readonly class AssignSantaService implements AssignSantaServiceContract
{

    public function __construct(
        private GroupRepositoryContract $groupRepository,
        private AssignSantaMapperContract $assignSantaMapper,
        private AssignSantaUseCaseContract $assignSantaUseCase,
        private CloseGroupUseCaseContract $closeGroupUseCase,
    ) {
    }

    public function assignSanta(AssignSantaRequestDTO $assignSantaRequestDTO): AssignSantaResponseDTO
    {
        // Check group exists
        try {
            $group = $this->checkGroupExists($assignSantaRequestDTO->getGroupJoinCode());
        } catch (Exception $e) {
            return new AssignSantaResponseDTO(false, $e->getMessage(), $e->getCode());
        }

        // Check is group member
        try {
            $member = $this->checkIsMember($assignSantaRequestDTO->getUserId(), $group->getId());
        } catch (Exception $e) {
            return new AssignSantaResponseDTO(false, $e->getMessage(), $e->getCode());
        }

        // Check is admin
        if (!$this->checkIsAdmin($member)) {
            return new AssignSantaResponseDTO(false, 'Not a admin', 403);
        }
    }

    /**
     * @throws Exception
     */
    private function checkGroupExists(string $groupJoinCode): Group
    {
        try {
            $group = $this->groupRepository->getGroupByJoinCode(
                new Group($groupJoinCode)
            );
        } catch (RepositoryException) {
            throw new Exception("Group not found", 404);
        }

        return $group;
    }

    /**
     * @throws Exception
     */
    private function checkIsMember(int $userId, int $groupId): GroupMember
    {
        try {
            $member = $this->groupRepository->getGroupMember(
                new GroupMember($userId, $groupId)
            );
        } catch (RepositoryException) {
            throw new Exception("Not a member", 401);
        }

        return $member;
    }

    private function checkIsAdmin(GroupMember $member): bool
    {
        return $member->getAdmin();
    }


}