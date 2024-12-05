<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\CreateToken;

use App\Authentication\Core\Domain\Entity\VKAuthentication\VKAuthentication;
use App\Authentication\Infrastructure\External\CreateToken\CreateTokenException;

interface CreateTokenContract
{
    /**
     * @throws CreateTokenException
     */
    public function create(VKAuthentication $vk): string;
}