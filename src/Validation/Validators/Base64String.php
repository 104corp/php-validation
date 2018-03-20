<?php

namespace Corp104\Validation\Validators;

use Corp104\Validation\ValidatorInterface;

class Base64String implements ValidatorInterface
{
    /**
     * @see https://stackoverflow.com/questions/8571501/how-to-check-whether-the-string-is-base64-encoded-or-not
     */
    const PATTERN = '/^([A-Za-z0-9+\/]{4})*([A-Za-z0-9+\/]{4}|[A-Za-z0-9+\/]{3}=|[A-Za-z0-9+\/]{2}==)$/';

    public function isValid($value)
    {
        if (!\is_string($value)) {
            return false;
        }

        return preg_match(self::PATTERN, $value);
    }
}
