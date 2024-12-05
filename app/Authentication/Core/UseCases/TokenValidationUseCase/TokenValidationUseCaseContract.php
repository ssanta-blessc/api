<?php

declare(strict_types=1);

namespace App\Authentication\Core\UseCases\TokenValidationUseCase;

use App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\RequestValueObject\TokenValidationRequestValueObject;
use App\Authentication\Core\Domain\Entity\TokenValidation\ValueObject\ResponseValueObject\TokenValidationResponseValueObject;

interface TokenValidationUseCaseContract
{
    public function validate(TokenValidationRequestValueObject $valueObject): TokenValidationResponseValueObject;
}