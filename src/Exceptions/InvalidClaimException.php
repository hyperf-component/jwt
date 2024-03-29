<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Exceptions;

use Exception;
use HyperfComponent\Jwt\Contracts\ClaimInterface;

class InvalidClaimException extends JwtException
{
    /**
     * Constructor.
     *
     * @param int $code
     */
    public function __construct(ClaimInterface $claim, $code = 0, ?Exception $previous = null)
    {
        parent::__construct('Invalid value provided for claim [' . $claim->getName() . ']', $code, $previous);
    }
}
