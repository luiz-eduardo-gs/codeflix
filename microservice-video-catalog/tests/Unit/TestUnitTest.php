<?php

namespace Tests\Unit;

use Core\Test;
use PHPUnit\Framework\TestCase;

final class TestUnitTest extends TestCase
{
    public function testMethodFoo()
    {
        $test = new Test();
        $return = $test->foo();

        $this->assertEquals('bar', $return);
    }
}