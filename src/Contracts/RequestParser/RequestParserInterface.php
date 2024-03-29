<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts\RequestParser;

use Psr\Http\Message\ServerRequestInterface;

interface RequestParserInterface
{
    /**
     * Get the parser chain.
     *
     * @return \HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface[]
     */
    public function getHandlers(): array;

    /**
     * Set the order of the parser chain.
     *
     * @param \HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface[] $handlers
     *
     * @return $this
     */
    public function setHandlers(array $handlers);

    /**
     * Iterate through the parsers and attempt to retrieve
     * a value, otherwise return null.
     */
    public function parseToken(ServerRequestInterface $request): ?string;

    /**
     * Check whether a token exists in the chain.
     */
    public function hasToken(ServerRequestInterface $request): bool;
}
