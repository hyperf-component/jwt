<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

use HyperfComponent\Jwt\Payload;

interface JwtInterface
{
    public function getPayload(): Payload;

    public function getToken(array $claim): string;

    public function refresh(): string;
}
