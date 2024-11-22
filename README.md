# PHP DSV Reader & Writer

Inspired by: [Why you should use and prefer DSV format instead of CSV](https://matthodges.com/posts/2024-08-12-csv-bad-dsv-good/)

[![CodeCov](https://codecov.io/gh/terremoth/php-dsv/graph/badge.svg?token=TOKEN)](https://app.codecov.io/gh/terremoth/php-dsv)
[![Psalm type coverage](https://shepherd.dev/github/terremoth/php-dsv/coverage.svg)](https://shepherd.dev/github/terremoth/php-dsv)
[![Psalm level](https://shepherd.dev/github/terremoth/php-dsv/level.svg)](https://shepherd.dev/github/terremoth/php-dsv)
[![Test Run Status](https://github.com/terremoth/php-dsv/actions/workflows/workflow.yml/badge.svg?branch=main)](https://github.com/terremoth/php-dsv/actions/workflows/workflow.yml)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/CODE)](https://app.codacy.com/gh/terremoth/php-dsv/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)
[![Code Climate Maintainability](https://api.codeclimate.com/v1/badges/CODE/maintainability)](https://codeclimate.com/github/terremoth/php-dsv/maintainability)
[![License](https://img.shields.io/github/license/terremoth/php-dsv.svg?logo=gnu&color=41bb13)](https://github.com/terremoth/php-dsv/blob/main/LICENSE)

See [demos/demo.php](demos/demo.php) for examples.  

## Installation

```shell
composer require terremoth/php-dsv --no-dev
```

## Usage:

```php
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
$writer->write($data); // will write the $data to file in DSV format

$reader = new DSVReader('demos/data.dsv');
print_r($reader->read()); // will read the demos/data.dsv file and put it in array format 
```
