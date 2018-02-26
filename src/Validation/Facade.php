<?php

namespace Corp104\Validation;

use Corp104\Validation\Exceptions\InvalidValidatorException;
use Exception;

/**
 * Validate Facade
 */
abstract class Facade
{
    /**
     * @var array
     */
    private static $instances = [];

    /**
     * @param string $validator Validation name
     * @param mixed $value
     * @return bool
     */
    public static function isValid($validator, $value): bool
    {
        if (!class_exists($validator)) {
            throw new InvalidValidatorException('Unknown Validation: ' . $validator);
        }

        if (!isset(self::$instances[$validator])) {
            $validatorInstance = new $validator();

            if (!$validatorInstance instanceof ValidatorInterface) {
                $message = 'Validation must be implement ValidatorInterface. Given class is ' . $validator;
                throw new InvalidValidatorException($message);
            }

            self::$instances[$validator] = $validatorInstance;
        }

        return self::$instances[$validator]->isValid($value);
    }

    /**
     * 使用驗證器做斷言行為
     *
     * 驗證通過不會有任何行為；驗證不通過時，將會丟例外。
     *
     * @param string $validator Validation name
     * @param mixed $value
     * @param Exception $exception
     * @throws Exception
     */
    public static function assert($validator, $value, Exception $exception)
    {
        if (!self::isValid($validator, $value)) {
            throw $exception;
        }
    }
}
