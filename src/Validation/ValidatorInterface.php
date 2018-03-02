<?php

namespace Corp104\Validation;

/**
 * Validate
 */
interface ValidatorInterface
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value);
}
