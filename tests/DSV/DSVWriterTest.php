<?php

namespace DSV;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(DSVWriter::class)]
class DSVWriterTest extends TestCase
{
    /**
     * @return array[]
     */
    public static function dataProvider(): array
    {
        return [
            [
                [
                    ['alpha', "fun with\ntwo lines"],
                    ['beta', 'café, résumé 📝'],
                    ['gamma', 'アップル']
                ], "alphafun with\ntwo linesbetacafé, résumé 📝gammaアップル"
            ],
            [
                [
                    ['alpha']
                ], "alpha"
            ],
            [
                [
                    ['alpha', 'beta']
                ], "alphabeta"
            ],
            [
                [
                    ['']
                ], ''
            ],
            [
                [
                    []
                ], ''
            ]
        ];
    }

    #[DataProvider('dataProvider')]
    public function testWrite(array $data, string $result): void
    {
        $file = tempnam(sys_get_temp_dir(), 'dsv-test-data');
        $writer = new DSVWriter($file);
        $writer->write($data);
        $this->assertEquals($result, file_get_contents($file));
        unlink($file);
    }
}
