<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

use HyperfComponent\Jwt\Claims\Collection;
use HyperfComponent\Jwt\Exceptions\TokenExpiredException;
use HyperfComponent\Jwt\Exceptions\TokenInvalidException;

interface PayloadValidatorInterface
{
    /**
     * Perform some checks on the value.
     * @throws TokenInvalidException
     * @throws TokenExpiredException
     */
    public function check(Collection $value, bool $ignoreExpired = false): Collection;

    /**
     * Helper function to return a boolean.
     */
    public function isValid(Collection $value, bool $ignoreExpired = false): bool;
}
