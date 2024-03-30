<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

class JwtId extends AbstractClaim
{
    protected string $name = 'jti';

    public function validate(bool $ignoreExpired = false): bool
    {
        return true;
    }
}
