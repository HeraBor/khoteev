<?php

use Khoteev\Equation;
use Khoteev\KhoteevException;

use PHPUnit\Framework\TestCase;

require __DIR__ . './../vendor/autoload.php';

class EquationTest extends TestCase {
    /**
     * @dataProvider providerEquation
     */
    public function testEquation($a, $b, $res) {
        $fTest = new Equation();
        $this->assertEquals($res, $fTest->a_solve($a, $b));
    }
    public function providerEquation ()
    {
        return array (
            array (1, 1, [-1]),
            array (-6, 6, [1]),
            array (1000, 77, [-0.077]),

        );
    }
    /**
     * @dataProvider providerEquationEx
     */
    public function testEquationEx($a, $b, $res) {
        $this->expectException(KhoteevException::class);
        $fTest = new Equation();
        $this->assertEquals($res, $fTest->a_solve($a, $b));
    }
    public function providerEquationEx ()
    {
        return array (
            array (0, 1, -1),
            array (0, 0, 0),
            array (null, null, 0),

        );
    }
}