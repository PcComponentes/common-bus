<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 19/04/18
 * Time: 12:44
 */

namespace Pccomponentes\CommonBus\Infrastructure\Bus\Query;

use Pccomponentes\CommonBus\Domain\Bus\Query\Query;
use Pccomponentes\CommonBus\Domain\Bus\Query\QueryBus;
use Pccomponentes\CommonBus\Domain\Bus\Query\Response;
use Pccomponentes\CommonBus\Infrastructure\Bus\HandlerRegistry;

final class QueryBusSync implements QueryBus
{
    private $registry;

    public function __construct()
    {
        $this->registry = new HandlerRegistry();
    }

    public function register($queryClass, callable $handler): void
    {
        $this->registry->add($queryClass, $handler);
    }

    public function ask(Query $query): Response
    {
        return $this->registry->find(get_class($query))($query);
    }
}
