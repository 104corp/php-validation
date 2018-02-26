<?php

namespace Corp104\Validation\Validators;

use Corp104\Validation\ValidatorInterface;

/**
 * IPv4 format
 */
class Ip implements ValidatorInterface
{
    public function isValid($value): bool
    {
        if (!\is_string($value)) {
            return false;
        }

        $pattern = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';

        return preg_match($pattern, $value);
    }
}
