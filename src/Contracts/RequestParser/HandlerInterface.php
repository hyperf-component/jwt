<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts\RequestParser;

use Hyperf\HttpServer\Request;
use Psr\Http\Message\ServerRequestInterface;

interface HandlerInterface
{
    /**
     * Parse the request.
     *
     * @param Request|ServerRequestInterface $request
     */
    public function parse(ServerRequestInterface $request): ?string;
}
