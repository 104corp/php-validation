<?php

namespace Tests;

use Corp104\Validation\Exceptions\InvalidValidatorException;
use Corp104\Validation\Facade;
use Corp104\Validation\Validators\StringType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Facade test
 */
class FacadeTest extends TestCase
{
    /**
     * @test
     */
    public function shouldThrowInvalidValidatorExceptionWhenGivenUnknownClass()
    {
        $this->setExpectedException(InvalidValidatorException::class, 'unknown');

        Facade::isValid('unknown', 'some-value');
    }

    /**
     * @test
     */
    public function shouldThrowInvalidValidatorExceptionWhenGivenClassNotInstanceOfValidatorInterface()
    {
        $this->setExpectedException(InvalidValidatorException::class);

        Facade::isValid(stdClass::class, 'some-value');
    }

    /**
     * @test
     */
    public function shouldReturnTrueWhenGivenEmailClassAndValidValue()
    {
        $validator = StringType::class;
        $value = 'string-var';

        $actual = Facade::isValid($validator, $value);

        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function shouldThrowInvalidArgumentExceptionWhenGivenEmailClassAndInvalidArgumentValue()
    {
        $validator = StringType::class;
        $value = 123;
        $message = 'Some message';
        $exception = new InvalidArgumentException($message);

        $this->setExpectedException(InvalidArgumentException::class, $message);

        Facade::assert($validator, $value, $exception);
    }

    /**
     * @test
     */
    public function shouldNothingHappenedWhenGivenEmailClassAndValidValue()
    {
        $validator = StringType::class;
        $value = 'string-var';
        $message = 'Some message';
        $exception = new InvalidArgumentException($message);

        Facade::assert($validator, $value, $exception);

        $this->assertTrue(true);
    }
}
