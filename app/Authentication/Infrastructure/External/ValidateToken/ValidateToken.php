<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\External\ValidateToken;

use App\Authentication\Core\Contracts\External\ValidateToken\ValidateTokenContract;
use App\Authentication\Core\Domain\Entity\TokenValidation\Token;
use Exception;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Validation\Constraint\SignedWith;

final readonly class ValidateToken implements ValidateTokenContract
{

    public function validate(Token $token): bool
    {
        $configuration = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::plainText(config('app.jwt_secret'))
        );

        try {
            $token = $configuration->parser()->parse($token->getToken());

            if (!$configuration->validator()->validate(
                $token,
                new SignedWith($configuration->signer(), $configuration->signingKey()),
            )) {
                return false;
            }
        } catch (Exception) {
            return false;
        }

        return true;
    }
}