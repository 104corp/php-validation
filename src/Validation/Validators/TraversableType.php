<?php

namespace Corp104\Validation\Validators;

use Corp104\Validation\ValidatorInterface;

/**
 * 驗證是否是 Traversable
 */
class TraversableType implements ValidatorInterface
{
    public function isValid($value)
    {
        return \is_array($value) || $value instanceof \Traversable;
    }
}
