<?php

use Khoteev\QuEquation;
use Khoteev\KhoteevException;
use PHPUnit\Framework\TestCase;

require __DIR__ . './../vendor/autoload.php';

class QuEquationTest extends TestCase {

    /**
     * @dataProvider providerSolve
     */
    public function testSolve($a, $b, $c, $res) {
        $fTest = new QuEquation();
        $this->assertEquals($res, $fTest->solve($a, $b, $c));
    }
    public function providerSolve ()
    {
        return array (
            array (15, 9, 0,[-76.5,58.5]),
            array (1, 6, -20,[-11.385164807134505 ,-0.6148351928654963]),
            array (0, 1, 1,[-1]),
            array (0, 1, 2, [-2.0]),

        );
    }
    /**
     * @dataProvider providerSolveChebEX
     */
    public function testSolveChebEX($a, $b, $c, $res) {
        $this->expectException(KhoteevException::class);
        $fTest = new QuEquation();
        $this->assertEquals($res, $fTest->solve($a, $b, $c));
    }
    public function providerSolveChebEX (): array
    {
        return array (
            array (0, 0, 0, 0),
            array (4, 2, 1, 0),
            array ('a', 'b', 'c', 0),
        );
    }
}