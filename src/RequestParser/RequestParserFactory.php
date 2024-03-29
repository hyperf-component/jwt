<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser;

use HyperfComponent\Jwt\RequestParser\Handlers\AuthHeaders;
use HyperfComponent\Jwt\RequestParser\Handlers\Cookies;
use HyperfComponent\Jwt\RequestParser\Handlers\InputSource;
use HyperfComponent\Jwt\RequestParser\Handlers\QueryString;
use HyperfComponent\Jwt\RequestParser\Handlers\RouteParams;

use function Hyperf\Support\make;

class RequestParserFactory
{
    public function __invoke()
    {
        return make(RequestParser::class)->setHandlers([
            new AuthHeaders(),
            new QueryString(),
            new InputSource(),
            new RouteParams(),
            new Cookies(),
        ]);
    }
}
