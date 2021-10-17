<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\Message;
use RuntimeException;

/**
 * @template T of Message
 */
class MessageException extends RuntimeException
{
    /**
     * @var Message
     * @phpstan-var T
     */
    private $message_value;

    /**
     * @phpstan-param T $message
     */
    public function __construct(Message $message)
    {
        $this->message_value = $message;
    }

    /**
     * @phpstan-return T
     */
    public function getMessageValue(): Message
    {
        return $this->message_value;
    }
}
