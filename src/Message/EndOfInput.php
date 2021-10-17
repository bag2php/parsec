<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\Message;

use function implode;

/**
 * @template I
 * @extends AbstractMessage<I>
 */
final class EndOfInput extends AbstractMessage
{
    use DefaultTrait;

    /**
     * @phpstan-param 0|positive-int $pos
     * @param list<string> $expected
     */
    public function __construct(int $pos, array $expected)
    {
        /** @phpstan-var I $symbol */
        $symbol = null;
        parent::__construct($pos, $symbol, $expected);
    }

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

        if ($this->pos !== $rhs->position()) return false;

        return $this->expected !== $rhs->expected();

    }

    public function __toString(): string
    {
        $expected = implode(', ', $this->expected);

        return  "\"Unexpected EOF at position {$this->pos}. Expecting one of [{$expected}]";
    }
}
