<?php

namespace Corp104\Validation\Validators;

use Corp104\Validation\Facade;
use Corp104\Validation\ValidatorInterface;

/**
 * 驗證是否是 UTF8 字串
 */
class Utf8String implements ValidatorInterface
{
    public function isValid($value)
    {
        if (!Facade::isValid(StringType::class, $value)) {
            return false;
        }

        return mb_detect_encoding($value, 'UTF-8', true) === 'UTF-8';
    }
}
