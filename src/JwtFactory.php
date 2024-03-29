<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\ContainerInterface;

use function Hyperf\Support\make;

class JwtFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $lockSubject = (bool) $config->get('jwt.lock_subject');
        return make(Jwt::class)->setLockSubject($lockSubject);
    }
}
