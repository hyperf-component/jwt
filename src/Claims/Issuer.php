<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

class Issuer extends AbstractClaim
{
    protected string $name = 'iss';

    public function validate(bool $ignoreExpired = false): bool
    {
        return true;
    }
}
