<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser\Handlers;

use Hyperf\HttpServer\Request;
use HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface as ParserContract;
use Psr\Http\Message\ServerRequestInterface;

class RouteParams implements ParserContract
{
    use KeyTrait;

    /**
     * @param Request|ServerRequestInterface $request
     */
    public function parse(ServerRequestInterface $request): ?string
    {
        return $request->route($this->key);
    }
}
