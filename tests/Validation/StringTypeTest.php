<?php

namespace Tests\Validation;

use Corp104\Validation\Validators\StringType;
use PHPUnit\Framework\TestCase;
use stdClass;

class StringTypeTest extends TestCase
{
    /**
     * @test
     * @dataProvider getCases
     */
    public function shouldGetExceptedResult($excepted, $input)
    {
        $target = new StringType();

        $actual = $target->isValid($input);

        $this->assertEquals($excepted, $actual);
    }

    public function getCases()
    {
        return [
            [true, ''],
            [true, 'abc'],
            [true, '中文'],
            [true, mb_convert_encoding('這是 BIG-5 字串', 'BIG-5')],
            [false, 123],
            [false, null],
            [false, []],
            [false, new stdClass()],
        ];
    }
}
