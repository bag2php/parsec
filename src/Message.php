<?php

declare(strict_types=1);

namespace Bag2\Parsec;

use Bag2\Parsec\Message\EndOfInput;
use Bag2\Parsec\Message\LazyMessage;

use Closure;

/**
 * An message which represents a (potential) parse failure.
 *
 * Note, the construction of a Message doesn't necessarily indicate an failure,
 * the message may be intended for use later on when a parse failure occurs.
 *
 * @template I
 */
interface Message
{
    /**
     * @phpstan-param 0|positive-int $pos
     * @phpstan-param I $sym
     * @phpstan-return Message<I>
     */
    public static function of(int $pos, $sym = null, ?string $expected = null): Message;

    /**
     * @phpstan-return EndOfInput<I>
     */
    public static function endOfInput(int $pos, string $expected): EndOfInput;

    /**
     * @phpstan-param Closure(): Message<I> $supplier
     * @phpstan-return LazyMessage<I>
     */
    public static function lazy(Closure $supplier): LazyMessage;

    /**
     * @phpstan-return 0|positive-int
     */
    public function position(): int;

    /**
     * @phpstan-return I
     */
    public function symbol();

    /**
     * @return list<string>
     */
    public function expected(): array;

    /**
     * @phpstan-return LazyMessage<I>
     */
    public function expect(string $name): LazyMessage;

    /**
     * @phpstan-param Message<I> $rhs
     * @phpstan-return Message<I>
     */
    public function merge(Message $rhs);
}
