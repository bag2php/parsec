<?php

declare(strict_types=1);

namespace Bag2\Parsec\Message;

use Bag2\Parsec\TestCase;

final class EndOfInputTest extends TestCase
{
    public function test(): void
    {
        $subject = new EndOfInput(123, ['foo']);

        $this->assertSame(123, $subject->position());
        $this->assertSame(null, $subject->symbol());
        $this->assertSame(['foo'], $subject->expected());
    }
}
