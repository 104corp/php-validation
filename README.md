# Validation

[![Build Status](https://travis-ci.org/104corp/php-validation.svg)](https://travis-ci.org/104corp/php-validation)

A simple validation library.

## 安裝套件

```bash
composer require 104corp/validation
```

## 使用方法

驗證元件使用方法很簡單，如果要驗證輸入是否為 string type 的話，可以這樣寫：

```php
<?php

use Corp104\Validation\Facade;
use Corp104\Validation\Validators\StringType;

$pid = 123;

if (Facade::isValid(StringType::class, $pid)) {
    echo '格式正確';
} else {
    echo '格式不正確';
}
```

元件也提供簡單的斷言驗證方法：

```php
<?php

use Corp104\Validator;
use Corp104\Validator\Validator\StringType;

$pid = 123;
$exception = new InvalidArgumentException('格式錯誤');

try {
    Facade::assert(StringType::class, $pid, $exception);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();  // 顯示 '格式錯誤'
}
```

## 驗證器

目前實作如下：

* [`Corp104\Validation\Validators\Ip`](/src/Validation/Validators/Ip.php)
* [`Corp104\Validation\Validators\StringType`](/src/Validation/Validators/StringType.php)
* [`Corp104\Validation\Validators\TraversableType`](/src/Validation/Validators/TraversableType.php)
* [`Corp104\Validation\Validators\Utf8String`](/src/Validation/Validators/Utf8String.php)

## Contributing

See [CONTRIBUTING](CONTRIBUTING.md) 。
