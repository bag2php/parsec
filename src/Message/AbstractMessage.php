<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\Message;

/**
 * An message which represents a (potential) parse failure.
 *
 * Note, the construction of a Message doesn't necessarily indicate an failure,
 * the message may be intended for use later on when a parse failure occurs.
 *
 * @template I
 * @implements Message<I>
 */
abstract class AbstractMessage implements Message
{
    /** @phpstan-var 0|positive-int */
    protected $pos;
    /** @phpstan-var I */
    protected $sym;
    /** @var list<string> */
    protected $expected;

    /**
     * @phpstan-param 0|positive-int $pos
     * @phpstan-param I $sym
     * @phpstan-param list<string> $expected
     */
    public function __construct(int $pos, $sym, array $expected)
    {
        $this->pos = $pos;
        $this->sym = $sym;
        $this->expected = $expected;
    }

    public function position(): int
    {
        return $this->pos;
    }

    public function symbol()
    {
        return $this->sym;
    }

    public function expected(): array
    {
        return $this->expected;
    }
}
