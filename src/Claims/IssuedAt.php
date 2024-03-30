<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

use HyperfComponent\Jwt\Exceptions\InvalidClaimException;
use HyperfComponent\Jwt\Exceptions\TokenExpiredException;
use HyperfComponent\Jwt\Exceptions\TokenInvalidException;

class IssuedAt extends AbstractClaim
{
    use DatetimeTrait {
        validateCreate as commonValidateCreate;
    }

    protected string $name = 'iat';

    public function validateCreate($value): mixed
    {
        $this->commonValidateCreate($value);

        if ($this->isFuture($value)) {
            throw new InvalidClaimException($this);
        }

        return $value;
    }

    public function validate(bool $ignoreExpired = false): bool
    {
        if ($this->isFuture($value = $this->getValue())) {
            throw new TokenInvalidException('Issued At (iat) timestamp cannot be in the future');
        }

        if (
            ($refreshTtl = $this->getFactory()->getRefreshTtl()) !== null && $this->isPast($value + $refreshTtl)
        ) {
            throw new TokenExpiredException('Token has expired and can no longer be refreshed');
        }

        return true;
    }
}
