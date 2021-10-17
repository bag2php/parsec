<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\TestCase;

final class LazyMessageTest extends TestCase
{
    public function test(): void
    {
        $subject = new LazyMessage(fn() => new MessageImpl(0, null, []));

        $this->assertSame(0, $subject->position());
        $this->assertSame(null, $subject->symbol());
        $this->assertSame([], $subject->expected());
    }
}
