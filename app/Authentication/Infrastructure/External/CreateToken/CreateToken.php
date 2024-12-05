<?php

declare(strict_types=1);

namespace App\Authentication\Infrastructure\External\CreateToken;

use App\Authentication\Core\Contracts\External\CreateToken\CreateTokenContract;
use App\Authentication\Core\Domain\Entity\VKAuthentication\VKAuthentication;
use Exception;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;


final readonly class CreateToken implements CreateTokenContract
{

    public function create(VKAuthentication $vk): string
    {
        try {
            $configuration = Configuration::forSymmetricSigner(
                new Sha256(),
                InMemory::plainText(config('app.jwt_secret'))
            );

            return $configuration->builder()
                ->withClaim('payload', $vk->toArray())
                ->getToken($configuration->signer(), $configuration->signingKey())
                ->toString();
        } catch (Exception) {
            throw new CreateTokenException();
        }
    }
}