<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

class Custom extends AbstractClaim
{
    /**
     * @param mixed $value
     */
    public function __construct(string $name, $value)
    {
        parent::__construct($value);
        $this->setName($name);
    }

    public function validate(bool $ignoreExpired = false): bool
    {
        return true;
    }
}
