<?php

namespace Corp104\Validation\Validators;

use Corp104\Validation\ValidatorInterface;

/**
 * 驗證是否是字串
 */
class StringType implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return \is_string($value);
    }
}
