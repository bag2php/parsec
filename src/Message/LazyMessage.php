<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\Message;
use Closure;

/**
 * @template I
 * @implements Message<I>
 */
final class LazyMessage implements Message
{
    use DefaultTrait;

    /** @phpstan-var Closure(): Message<I> */
    private $supplier;

    /**
     * @phpstan-param Closure(): Message<I> $supplier
     */
    public function __construct(Closure $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * @phpstan-return 0|positive-int
     */
    public function position(): int
    {
        return $this->get()->position();
    }

    /**
     * @phpstan-return I
     */
    public function symbol()
    {
        return $this->get()->symbol();
    }

    /**
     * @return list<string>
     */
    public function expected(): array
    {
        return $this->get()->expected();
    }

    /**
     * @phpstan-return Message<I>
     */
    private function get(): Message
    {
        return ($this->supplier)();
    }
}
