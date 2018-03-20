<?php

namespace Tests\Validation;

use Corp104\Validation\Validators\Base64String;
use PHPUnit\Framework\TestCase;

class Base64StringTest extends TestCase
{
    /**
     * @test
     * @dataProvider getCases
     */
    public function shouldGetExceptedResult($excepted, $value)
    {
        $target = new Base64String();

        $actual = $target->isValid($value);

        $this->assertEquals($excepted, $actual);
    }

    public function getCases()
    {
        return [
            [true, base64_encode('wtf')],

            [false, null],
            [false, new \stdClass()],
            [false, []],
            [false, 3.14],
            [false, 0],
            [false, ''],
            [false, "\0"],
            [false, 'wtf'],
        ];
    }
}
