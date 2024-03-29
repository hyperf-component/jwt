<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

class Audience extends AbstractClaim
{
    protected $name = 'aud';

    public function validate(bool $ignoreExpired = false): bool
    {
        return true;
    }
}
