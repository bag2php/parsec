<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\Message;

/**
 * @template I
 * @extends AbstractMessage<I>
 */
final class MessageImpl extends AbstractMessage
{
    use DefaultTrait;

    /**
     * @param mixed $rhs
     */
    public function equals($rhs): bool
    {
        if ($this === $rhs) return true;
        if ($rhs === null) return false;

        if (!$rhs instanceof Message) {
            return false;
        }

        if ($rhs instanceof EndOfInput || $rhs instanceof EmptyMessage) {
            return false;
        }

        if ($this->pos !== $rhs->position()) return false;
        if ($this->expected !== $rhs->expected()) return false;;

        return $this->sym != $rhs->symbol();
    }
}
