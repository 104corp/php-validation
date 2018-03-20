<?php

namespace Corp104\Validation\Validators;

use Corp104\Validation\ValidatorInterface;

class UuidV4 implements ValidatorInterface
{
    public function isValid($value)
    {
        if (!\is_string($value)) {
            return false;
        }

        return preg_match('/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}/', $value);
    }
}
