<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 19/04/18
 * Time: 12:35
 */

namespace Pccomponentes\CommonBus\Domain\Bus\Query;

use Pccomponentes\CommonBus\Domain\Bus\Message;
use Pccomponentes\Ddd\Domain\Model\ValueObject\Uuid;

abstract class Query extends Message
{
    public function queryId(): Uuid
    {
        return $this->messageId();
    }

    public function messageType(): string
    {
        return 'query';
    }
}
