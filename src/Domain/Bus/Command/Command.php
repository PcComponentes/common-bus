<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 16/04/18
 * Time: 14:27
 */

namespace Pccomponentes\CommonBus\Domain\Bus\Command;

use Pccomponentes\CommonBus\Domain\Bus\Message;
use Pccomponentes\Ddd\Domain\Model\ValueObject\Uuid;

abstract class Command extends Message
{
    public function commandId(): Uuid
    {
        return $this->messageId();
    }

    public function messageType(): string
    {
        return 'command';
    }
}