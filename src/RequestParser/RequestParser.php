<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser;

use Hyperf\HttpServer\Request;
use HyperfComponent\Jwt\Contracts\RequestParser\RequestParserInterface;

class RequestParser implements RequestParserInterface
{
    /**
     * @var \HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface[]
     */
    private $handlers;

    /**
     * @param \HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface[] $handlers
     */
    public function __construct(array $handlers = [])
    {
        $this->handlers = $handlers;
    }

    public function getHandlers(): array
    {
        return $this->handlers;
    }

    public function setHandlers(array $handlers)
    {
        $this->handlers = $handlers;

        return $this;
    }

    public function parseToken(Request $request): ?string
    {
        foreach ($this->handlers as $handler) {
            if ($token = $handler->parse($request)) {
                return $token;
            }
        }
        return null;
    }

    public function hasToken(Request $request): bool
    {
        return $this->parseToken($request) !== null;
    }
}
