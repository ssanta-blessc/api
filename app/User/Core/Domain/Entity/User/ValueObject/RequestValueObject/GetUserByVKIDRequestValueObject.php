<?php

declare(strict_types=1);

namespace App\User\Core\Domain\Entity\User\ValueObject\RequestValueObject;

final readonly class GetUserByVKIDRequestValueObject
{
    public function __construct(
        private int $vkid
    ) {
    }

    public function getVkid(): int
    {
        return $this->vkid;
    }


}