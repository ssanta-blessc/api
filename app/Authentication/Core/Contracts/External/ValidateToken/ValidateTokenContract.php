<?php

declare(strict_types=1);

namespace App\Authentication\Core\Contracts\External\ValidateToken;

use App\Authentication\Core\Domain\Entity\TokenValidation\Token;

interface ValidateTokenContract
{
    public function validate(Token $token): bool;
}