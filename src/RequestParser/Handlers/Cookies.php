<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser\Handlers;

use HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface as ParserContract;
use Psr\Http\Message\ServerRequestInterface;

use function Hyperf\Collection\data_get;

class Cookies implements ParserContract
{
    use KeyTrait;

    public function parse(ServerRequestInterface $request): ?string
    {
        return data_get($request->getCookieParams(), $this->key);
    }
}
