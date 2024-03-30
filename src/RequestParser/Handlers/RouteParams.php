<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser\Handlers;

use Hyperf\HttpServer\Request;
use HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface as ParserContract;

class RouteParams implements ParserContract
{
    use KeyTrait;

    private string $key;

    public function parse(Request $request): mixed
    {
        return $request->route($this->key);
    }
}
