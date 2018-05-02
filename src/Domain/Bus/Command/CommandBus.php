<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 16/04/18
 * Time: 14:26
 */

namespace Pccomponentes\CommonBus\Domain\Bus\Command;

interface CommandBus
{
    public function register(string $commandClass, callable $handler): void;

    public function dispatch(Command $command): void;
}
