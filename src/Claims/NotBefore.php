<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

use HyperfComponent\Jwt\Exceptions\TokenInvalidException;

class NotBefore extends AbstractClaim
{
    use DatetimeTrait;

    protected string $name = 'nbf';

    public function validate(bool $ignoreExpired = false): bool
    {
        if ($this->isFuture($this->getValue())) {
            throw new TokenInvalidException('Not Before (nbf) timestamp cannot be in the future');
        }
        return true;
    }
}
