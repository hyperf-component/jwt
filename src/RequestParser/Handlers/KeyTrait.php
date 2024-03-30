<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser\Handlers;

trait KeyTrait
{
    /**
     * The key.
     */
    protected string $key = 'token';

    /**
     * Set the key.
     *
     * @return $this
     */
    public function setKey(string $key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the key.
     */
    public function getKey(): string
    {
        return $this->key;
    }
}
