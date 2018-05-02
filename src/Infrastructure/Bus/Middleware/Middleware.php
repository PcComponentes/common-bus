<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 17/04/18
 * Time: 14:28
 */

namespace Pccomponentes\CommonBus\Infrastructure\Bus\Middleware;

interface Middleware
{
    public function __invoke($message, callable $next): ?callable ;
}
