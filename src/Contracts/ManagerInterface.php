<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Contracts;

use HyperfComponent\Jwt\Blacklist;
use HyperfComponent\Jwt\Exceptions\JwtException;
use HyperfComponent\Jwt\Exceptions\TokenBlacklistedException;
use HyperfComponent\Jwt\Payload;
use HyperfComponent\Jwt\Token;

interface ManagerInterface
{
    /**
     * Encode a Payload and return the Token.
     */
    public function encode(Payload $payload): Token;

    /**
     * Decode a Token and return the Payload.
     *
     * @throws TokenBlacklistedException
     */
    public function decode(Token $token, bool $checkBlacklist = true): Payload;

    /**
     * Refresh a Token and return a new Token.
     *
     * @throws TokenBlacklistedException
     * @throws JwtException
     */
    public function refresh(Token $token, bool $forceForever = false): Token;

    /**
     * Invalidate a Token by adding it to the blacklist.
     *
     * @throws JwtException
     */
    public function invalidate(Token $token, bool $forceForever = false): bool;
}
