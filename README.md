# Hyperf JWT


The jwt component for Hyperf.

## Installation

- Installation

```shell
composer require hyperf-component/jwt
```

## 发布配置

```shell script
php bin/hyperf.php vendor:publish hyperf-component/jwt
```

## 使用

```php
<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use HyperfComponent\Jwt\Contracts\JwtInterface;
use HyperfComponent\Jwt\Payload;
use HyperfComponents\HyperfBase\Controller\BaseController;

#[AutoController]
class JwtController extends Controller
{
    #[Inject]
    protected JwtInterface $jwt;

    /**
     * 解析token.
     */
    public function getPayload(): Payload
    {
        return $this->jwt->getPayload();
    }

    /**
     * 创建token.
     */
    public function getToken(): string
    {
        return $this->jwt->getToken(['id' => 1, 'jti' => uniqid()]);
    }

    /**
     * 刷新token.
     */
    public function refresh(): string
    {
        return $this->jwt->refresh();
    }

    /*
     * 解析token.
     */
    public function getPayloadByJwt(): Payload
    {
        return jwt()->getPayload();
    }

    /**
     * 创建token.
     */
    public function getTokenByJwt(): string
    {
        return jwt()->getToken(['id' => 1, 'jti' => uniqid()]);
    }

    /**
     * 刷新token.
     */
    public function refreshByJwt(): string
    {
        return jwt()->refresh();
    }
}
```
