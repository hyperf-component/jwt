<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Validators;

use HyperfComponent\Jwt\Contracts\TokenValidatorInterface;
use HyperfComponent\Jwt\Exceptions\JwtException;
use HyperfComponent\Jwt\Exceptions\TokenInvalidException;

class TokenValidator implements TokenValidatorInterface
{
    /**
     * Check the structure of the token.
     */
    public function check(string $value): string
    {
        $this->validateStructure($value);
        return $value;
    }

    /**
     * Helper function to return a boolean.
     */
    public function isValid(string $value): bool
    {
        try {
            $this->check($value);
        } catch (JwtException $e) {
            return false;
        }

        return true;
    }

    /**
     * @throws TokenInvalidException
     */
    protected function validateStructure(string $token)
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            throw new TokenInvalidException('Wrong number of segments');
        }

        $parts = array_filter(array_map('trim', $parts));

        if (count($parts) !== 3 or implode('.', $parts) !== $token) {
            throw new TokenInvalidException('Malformed token');
        }

        return $this;
    }
}
