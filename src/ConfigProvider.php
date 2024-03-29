<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

use HyperfComponent\Jwt\Commands\GenJwtKeypairCommand;
use HyperfComponent\Jwt\Commands\GenJwtSecretCommand;
use HyperfComponent\Jwt\Contracts\JwtInterface;
use HyperfComponent\Jwt\Contracts\ManagerInterface;
use HyperfComponent\Jwt\Contracts\PayloadValidatorInterface;
use HyperfComponent\Jwt\Contracts\RequestParser\RequestParserInterface;
use HyperfComponent\Jwt\Contracts\TokenValidatorInterface;
use HyperfComponent\Jwt\RequestParser\RequestParserFactory;
use HyperfComponent\Jwt\Validators\PayloadValidator;
use HyperfComponent\Jwt\Validators\TokenValidator;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                ManagerInterface::class => ManagerFactory::class,
                TokenValidatorInterface::class => TokenValidator::class,
                PayloadValidatorInterface::class => PayloadValidator::class,
                RequestParserInterface::class => RequestParserFactory::class,
                JwtInterface::class => JwtFactory::class,
            ],
            'commands' => [
                GenJwtSecretCommand::class,
                GenJwtKeypairCommand::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for hyperf-ext/jwt.',
                    'source' => __DIR__ . '/../publish/jwt.php',
                    'destination' => BASE_PATH . '/config/autoload/jwt.php',
                ],
            ],
        ];
    }
}
