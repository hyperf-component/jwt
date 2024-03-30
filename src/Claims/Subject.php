<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

class Subject extends AbstractClaim
{
    protected string $name = 'sub';

    public function validate(bool $ignoreExpired = false): bool
    {
        return true;
    }
}
