<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ContainerInterface;
use HyperfComponent\Jwt\Contracts\JwtInterface;
use InvalidArgumentException;

/**
 * Get the available container instance.
 *
 * @template T
 *
 * @param class-string<T> $abstract
 *
 * @return ContainerInterface|T
 */
function di(?string $abstract = null, array $parameters = [])
{
    if (ApplicationContext::hasContainer()) {
        /** @var ContainerInterface $container */
        $container = ApplicationContext::getContainer();

        if (is_null($abstract)) {
            return $container;
        }

        if (count($parameters) == 0 && $container->has($abstract)) {
            return $container->get($abstract);
        }

        return $container->make($abstract, $parameters);
    }

    if (is_null($abstract)) {
        throw new InvalidArgumentException('Invalid argument $abstract');
    }

    return new $abstract(...array_values($parameters));
}

if (! function_exists('jwt')) {
    function jwt(): Jwt
    {
        return di()->get(JwtInterface::class);
    }
}
