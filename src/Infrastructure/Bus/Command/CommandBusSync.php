<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 19/04/18
 * Time: 8:18
 */

namespace Pccomponentes\CommonBus\Infrastructure\Bus\Command;

use Pccomponentes\CommonBus\Domain\Bus\Command\Command;
use Pccomponentes\CommonBus\Domain\Bus\Command\CommandBus;
use Pccomponentes\CommonBus\Infrastructure\Bus\HandlerRegistry;
use Pccomponentes\CommonBus\Infrastructure\Bus\Middleware\Middleware;
use Pccomponentes\CommonBus\Infrastructure\Bus\Middleware\MiddlewareChainCreator;

final class CommandBusSync implements CommandBus
{
    private $middlewareChainCreator;
    private $registry;

    public function __construct(Middleware ...$middlewares)
    {
        $this->middlewareChainCreator = new MiddlewareChainCreator(...$middlewares);
        $this->registry = new HandlerRegistry();
    }

    public function register(string $commandClass, callable $handler): void
    {
        $this->registry->add($commandClass, ($this->middlewareChainCreator)($handler));
    }

    public function dispatch(Command $command): void
    {
        $this->registry->find(get_class($command))($command);
    }
}
