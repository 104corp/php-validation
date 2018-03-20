<?php

namespace Tests\Validation;

use Corp104\Validation\Validators\UuidV4;
use PHPUnit\Framework\TestCase;

class UuidV4Test extends TestCase
{
    /**
     * @test
     * @dataProvider getCases
     */
    public function shouldGetExceptedResult($excepted, $value)
    {
        $target = new UuidV4();

        $actual = $target->isValid($value);

        $this->assertEquals($excepted, $actual);
    }

    public function getCases()
    {
        return [
            [true, '9a8d02af-4c9e-4d49-bb2d-3472db6b3d37'],

            [false, null],
            [false, new \stdClass()],
            [false, []],
            [false, 3.14],
            [false, 0],
            [false, ''],
            [false, "\0"],
            [false, 'invalid'],
        ];
    }
}
