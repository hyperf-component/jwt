<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

use HyperfComponent\Jwt\Exceptions\TokenExpiredException;

class Expiration extends AbstractClaim
{
    use DatetimeTrait;

    protected string $name = 'exp';

    public function validate(bool $ignoreExpired = false): bool
    {
        if (! $ignoreExpired and $this->isPast($this->getValue())) {
            throw new TokenExpiredException('Token has expired');
        }
        return true;
    }
}
