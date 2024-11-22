<?php

namespace DSV;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DSV::class)]
class DSVTest extends TestCase
{
    public function testDelimiter(): void
    {
        $dsv = new DSV();
        $this->assertEquals("\x1F", $dsv->delimiter);
    }

    public function testSeparator(): void
    {
        $dsv = new DSV();
        $this->assertEquals("\x1E", $dsv->recordSeparator);
    }
}
