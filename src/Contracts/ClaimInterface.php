<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

use HyperfComponent\Jwt\Exceptions\InvalidClaimException;

interface ClaimInterface
{
    /**
     * Set the claim value, and call a validate method.
     *
     * @param mixed $value
     *
     * @return $this
     * @throws InvalidClaimException
     */
    public function setValue($value);

    /**
     * Get the claim value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Set the claim name.
     *
     * @return $this
     */
    public function setName(string $name);

    /**
     * Get the claim name.
     */
    public function getName(): string;

    /**
     * Validate the Claim value.
     */
    public function validate(bool $ignoreExpired = false): bool;
}
