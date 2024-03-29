<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\RequestParser\Handlers;

use HyperfComponent\Jwt\Contracts\RequestParser\HandlerInterface as ParserContract;
use Psr\Http\Message\ServerRequestInterface;

use function Hyperf\Collection\data_get;

class InputSource implements ParserContract
{
    use KeyTrait;

    public function parse(ServerRequestInterface $request): ?string
    {
        $data = data_get(
            is_array($data = $request->getParsedBody()) ? $data : [],
            $this->key
        );
        return empty($data) === null ? null : (string) $data;
    }
}
