<?php

namespace Tests\Validation;

use Corp104\Validation\Validators\Ip;
use PHPUnit\Framework\TestCase;
use stdClass;

class IpTest extends TestCase
{
    /**
     * @test
     * @dataProvider getCases
     */
    public function shouldGetExceptedResult($value, $excepted)
    {
        $target = new Ip();

        $actual = $target->isValid($value);

        $this->assertEquals($excepted, $actual);
    }

    public function getCases()
    {
        return [
            ['1.2.3.4', true],
            ['12.34.56.78', true],
            ['254.254.254.254', true],
            ['1,2,3,4', false],
            [123, false],
            [null, false],
            ['', false],
            ["\0", false],
            [[], false],
            [new stdClass(), false],

            // Adjust format for general using
            ['127.0.0.1', true],
            ['172.16.1.1', true],
            ['0.0.0.0', true],
            ['255.255.255.255', true],
            ['169.254.1.1', true],
            ['224.1.1.1', true],
            ['192.168.1.1', true],
        ];
    }
}
