<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 19/04/18
 * Time: 8:42
 */

namespace Pccomponentes\CommonBus\Infrastructure\Bus\Middleware;

final class MiddlewareChainCreator
{
    private $middlewares;

    public function __construct(Middleware ...$middlewares)
    {
        $this->middlewares = $middlewares;
    }

    public function __invoke(callable $handler)
    {
        $lastCallable = $handler;

        while ($middleware = array_pop($this->middlewares)) {
            $lastCallable = function ($message) use ($middleware, $lastCallable) {
                return $middleware($message, $lastCallable);
            };
        }

        return $lastCallable;
    }
}
