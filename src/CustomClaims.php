<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

trait CustomClaims
{
    /**
     * Custom claims.
     *
     * @var array
     */
    protected $customClaims = [];

    /**
     * Set the custom claims.
     *
     * @return $this
     */
    public function setCustomClaims(array $customClaims)
    {
        $this->customClaims = $customClaims;

        return $this;
    }

    /**
     * Get the custom claims.
     */
    public function getCustomClaims(): array
    {
        return $this->customClaims;
    }
}
