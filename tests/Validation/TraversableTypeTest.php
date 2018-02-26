<?php

namespace Tests\Validation;

use Corp104\Validation\Validators\TraversableType;
use PHPUnit\Framework\TestCase;
use stdClass;
use Traversable;

class TraversableTypeTest extends TestCase
{
    /**
     * @test
     * @dataProvider getCases
     */
    public function shouldGetExceptedResult($excepted, $input)
    {
        $target = new TraversableType();

        $actual = $target->isValid($input);

        $this->assertEquals($excepted, $actual);
    }

    public function getCases()
    {
        return [
            [true, []],
            [true, $this->createMock(Traversable::class)],
            [false, ''],
            [false, 'abc'],
            [false, '中文'],
            [false, mb_convert_encoding('這是 BIG-5 字串', 'BIG-5')],
            [false, 123],
            [false, null],
            [false, new stdClass()],
        ];
    }
}
