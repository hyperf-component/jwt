<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

interface JwtSubjectInterface
{
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJwtIdentifier();

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJwtCustomClaims(): array;
}
