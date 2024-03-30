<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

interface StorageInterface
{
    public function add(string $key, mixed $value, int $ttl);

    public function forever(string $key, mixed $value);

    /**
     * @return mixed
     */
    public function get(string $key);

    public function destroy(string $key): bool;

    public function flush(): void;
}
