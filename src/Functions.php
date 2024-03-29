<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ContainerInterface;
use HyperfComponent\Jwt\Contracts\JwtInterface;

if (! function_exists('container')) {
    /**
     * 获取容器实例.
     */
    function container(): ContainerInterface
    {
        return ApplicationContext::getContainer();
    }
}

if (! function_exists('jwt')) {
    /**
     * 获取Redis实例.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function jwt(): Jwt
    {
        return container()->get(JwtInterface::class);
    }
}
