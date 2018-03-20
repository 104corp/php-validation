<?php

namespace Tests\Validation;

use Corp104\Validation\Validators\Utf8String;
use PHPUnit\Framework\TestCase;
use stdClass;

class Utf8StringTest extends TestCase
{
    /**
     * @test
     * @dataProvider getCases
     */
    public function shouldGetExceptedResult($excepted, $input)
    {
        $target = new Utf8String();

        $actual = $target->isValid($input);

        $this->assertEquals($excepted, $actual);
    }

    public function getCases()
    {
        return [
            [true, ''],
            [true, 'abc'],
            [true, '中文'],

            [false, mb_convert_encoding('這是 BIG-5 字串', 'BIG-5')],
            [false, 123],
            [false, null],
            [false, []],
            [false, new stdClass()],
        ];
    }
}
