<?php

namespace DSV;

use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Reader::class)]
class ReaderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testRead(): void
    {
        $mockStr = "NameCommentAliceShe said, \"Hello\" and waved.BobThis is a multi-line" .
            "comment\r\nspanning two lines.CharlieMore fun with\ntwo lines.DianaHow about some" .
            "UTF-8: café, naïve, résumé. 📝Edwardアップル";

        $tempFile = tempnam(sys_get_temp_dir(), 'dsv-test-data');
        $handle = fopen($tempFile, "w");
        fwrite($handle, $mockStr);
        fclose($handle);

        $totalFileLines = 6;

        $reader = new Reader($tempFile);
        $result = $reader->read();
        $this->assertEquals(count($result), $totalFileLines);
        unlink($tempFile);
    }

    /**
     * @throws Exception
     */
    public function testException(): void
    {
        $this->expectException(Exception::class);
        $reader = new Reader(random_int(0, 999999) . '.dsv');
        $reader->read();
    }
}
