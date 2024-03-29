<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Exceptions;

use Exception;

class JwtException extends Exception
{
    protected $message = 'An error occurred';
}
