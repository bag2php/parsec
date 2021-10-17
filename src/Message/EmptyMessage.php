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
 * @implements Message<?I>
 */
final class EmptyMessage implements Message
{
    use DefaultTrait;

    public function __construct()
    {
    }

    /**
     * @template T
     * @phpstan-param class-string<T> $class
     * @return EmptyMessage<T>
     */
    public static function instance(string $class): self
    {
        return new EmptyMessage();
    }

    public function position(): int
    {
        return 0;
    }

    public function symbol()
    {
        return null;
    }

    public function expected(): array
    {
        return [];
    }
}
