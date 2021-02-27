<?php

use Khoteev\MyLog;
use PHPUnit\Framework\TestCase;

class MyLogTest extends TestCase
{
    /**
     * @dataProvider providerEquation
     */
    public function testLog($str)
    {
        $this->assertEquals('',  MyLog::log($str));
    }
    public function providerEquation ()
    {
        return array (
            array ("test1"),
            array ("test2"),
            array (121231),
            array (true),
        );
    }
    public function testLogTex()
    {
        $this->expectException(TypeError::class);
        $this->assertEquals('',  MyLog::log(null));
        $this->assertEquals('',  MyLog::log());
    }
    public function testWrite()
    {
        $this->assertEquals('',   MyLog::write(123));
        $this->assertEquals('',   MyLog::write("test"));

    }
}