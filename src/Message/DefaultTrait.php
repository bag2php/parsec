<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\Message;
use Closure;

use function array_merge;
use function array_unique;
use function array_values;

trait DefaultTrait
{
    public static function of(int $pos, $sym = null, string $expected = null): Message
    {
        return new MessageImpl($pos, $sym, ($expected !== null) ? [$expected] : []);
    }

    /**
     * @phpstan-param 0|positive-int $pos
     */
    public static function endOfInput(int $pos, string $expected): EndOfInput
    {
        return $result = new EndOfInput($pos, [$expected]);
    }

    public static function lazy(Closure $supplier): LazyMessage
    {
        return new LazyMessage($supplier);
    }

    public function expect(string $name): LazyMessage
    {
        return static::lazy(fn() => static::of($this->position(), $this->symbol(), $name));
    }

    public function merge(Message $rhs): Message
    {
        return static::lazy(fn() => new MessageImpl(
            $this->position(),
            $this->symbol(),
            array_values(array_unique(array_merge($this->expected(), $rhs->expected())))
        ));
    }
}
