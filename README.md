# PHP DSV Reader & Writer

[![Test Run Status](https://github.com/terremoth/php-dsv/actions/workflows/workflow.yml/badge.svg?branch=main)](https://github.com/terremoth/php-dsv/actions/workflows/workflow.yml)
[![License](https://img.shields.io/github/license/terremoth/php-dsv.svg?logo=gnu&color=41bb13)](https://github.com/terremoth/php-dsv/blob/main/LICENSE)
[![Latest Stable Version](https://poser.pugx.org/terremoth/php-dsv/v/stable)](https://packagist.org/packages/terremoth/php-dsv)
[![Total Downloads](https://poser.pugx.org/terremoth/php-dsv/downloads)](https://packagist.org/packages/terremoth/php-dsv)  
[![codecov](https://codecov.io/github/terremoth/php-dsv/graph/badge.svg?token=ZED14FNR0B)](https://codecov.io/github/terremoth/php-dsv)
[![Test Coverage](https://api.codeclimate.com/v1/badges/2928743b6e92d8e70128/test_coverage)](https://codeclimate.com/github/terremoth/php-dsv/test_coverage)
[![Psalm type coverage](https://shepherd.dev/github/terremoth/php-dsv/coverage.svg)](https://shepherd.dev/github/terremoth/php-dsv)
[![Psalm level](https://shepherd.dev/github/terremoth/php-dsv/level.svg)](https://shepherd.dev/github/terremoth/php-dsv)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/0edf6ce999c548f8ab994288611e3d0f)](https://app.codacy.com/gh/terremoth/php-dsv/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/2928743b6e92d8e70128/maintainability)](https://codeclimate.com/github/terremoth/php-dsv/maintainability)

Inspired by: [Why you should use and prefer DSV format instead of CSV](https://matthodges.com/posts/2024-08-12-csv-bad-dsv-good/)  

See [demos/demo.php](demos/demo.php) for examples.  

## Installation

```shell
composer require terremoth/php-dsv
```

## Usage

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
