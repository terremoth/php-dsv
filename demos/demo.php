<?php

require_once 'vendor/autoload.php';

use DSV\DSVWriter;
use DSV\DSVReader;

$data = [
    ['Name', 'Comment'],
    ['Alice', 'She said, "Hello" and waved.'],
    ['Bob', 'This is a multi-line comment\r\nspanning two lines.'],
    ['Charlie', 'More fun with\ntwo lines.'],
    ['Diana', 'How about some UTF-8: café, naïve, résumé. 📝'],
    ['Edward', 'アップル'],
];

$writer = new DSVWriter('demos/data.dsv');
$writer->write($data);

$reader = new DSVReader('demos/data.dsv');

print_r($reader->read());
