<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

use Hyperf\Context\ApplicationContext;
use HyperfComponent\Jwt\Contracts\TokenValidatorInterface;

class Token
{
    private string $value;

    private TokenValidatorInterface $validator;

    /**
     * Create a new JSON Web Token.
     */
    public function __construct(string $value)
    {
        $this->validator = ApplicationContext::getContainer()->get(TokenValidatorInterface::class);
        $this->value = (string) $this->validator->check($value);
    }

    /**
     * Get the token when casting to string.
     */
    public function __toString(): string
    {
        return $this->get();
    }

    /**
     * Get the token.
     */
    public function get(): string
    {
        return $this->value;
    }
}
