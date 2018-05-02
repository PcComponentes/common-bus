<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 19/04/18
 * Time: 13:26
 */

namespace Pccomponentes\CommonBus\Infrastructure\Bus;

class HandlerRegistry
{
    private $handlers = [];

    public function add($key, callable $handler)
    {
        $this->handlers[$key] = $handler;
    }

    public function find($key)
    {
        return $this->handlers[$key];
    }
}
