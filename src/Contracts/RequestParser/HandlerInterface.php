<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts\RequestParser;

use Hyperf\HttpServer\Request;

interface HandlerInterface
{
    /**
     * Parse the request.
     */
    public function parse(Request $request): mixed;
}
