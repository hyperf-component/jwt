<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

interface TokenValidatorInterface extends ValidatorInterface
{
    /**
     * Perform some checks on the value.
     */
    public function check(string $value): string;

    /**
     * Helper function to return a boolean.
     */
    public function isValid(string $value): bool;
}
