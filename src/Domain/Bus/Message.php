<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 26/04/18
 * Time: 8:55
 */

namespace Pccomponentes\CommonBus\Domain\Bus;

use Pccomponentes\Ddd\Domain\Model\Types\Uuid;

abstract class Message
{
    private $messageId;

    public function __construct(Uuid $messageId)
    {
        $this->messageId = $messageId;
    }

    public function messageId(): Uuid
    {
        return $this->messageId;
    }

    abstract public function messageType(): string;
}
