<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\TestCase;

final class EmptyMessageTest extends TestCase
{
    public function test(): void
    {
        $subject = EmptyMessage::instance(TestCase::class);

        $this->assertSame(0, $subject->position());
        $this->assertSame(null, $subject->symbol());
        $this->assertSame([], $subject->expected());
    }
}
