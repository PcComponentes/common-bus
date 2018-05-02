<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 19/04/18
 * Time: 12:30
 */

namespace Pccomponentes\CommonBus\Domain\Bus\Query;

interface QueryBus
{
    public function register($queryClass, callable $handler): void;

    public function ask(Query $query): Response;
}
