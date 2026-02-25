<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2021-02-28 10:32:53+01:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\math;

use PHPUnit\Framework\TestCase;
use \tiglib\math\modN;


class modNTest extends TestCase {

    public function test0(){
        $this->assertEquals(0, modN::compute(0, 10));
        $this->assertEquals(0, modN::compute(10, 10));
        $this->assertEquals(0, modN::compute(20, 10));
        $this->assertEquals(0, modN::compute(-10, 10));
        $this->assertEquals(0, modN::compute(-20, 10));
    }
    
    public function testPositiveInt(){
        $this->assertEquals(8, modN::compute(8, 10));
        $this->assertEquals(1, modN::compute(11, 10));
        $this->assertEquals(0, modN::compute(40, 10));
    }
    
    public function testNegativeInt(){
        $this->assertEquals(7, modN::compute(-3, 10));
        $this->assertEquals(1, modN::compute(-9, 10));
        $this->assertEquals(9, modN::compute(-11, 10));
        $this->assertEquals(9, modN::compute(-21, 10));
    }
    
    public function testPositiveDecimal(){
        $this->assertEquals(8.1, round(modN::compute(8.1, 10), 1));
        $this->assertEquals(2.99, round(modN::compute(12.99, 10), 2));
        $this->assertEquals(2.9999, round(modN::compute(12.9999, 10), 4));
    }
    
    public function testNegativeDecimal(){
        $this->assertEquals(9.9, round(modN::compute(-0.1, 10), 1));
        $this->assertEquals(0.1, round(modN::compute(-9.9, 10), 1));
    }
    
} // end class
