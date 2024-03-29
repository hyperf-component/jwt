<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

interface CodecInterface
{
    public function encode(array $payload): string;

    public function decode(string $token): array;
}
