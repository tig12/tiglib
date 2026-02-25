<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2021-02-28 10:32:53+01:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\math;

use PHPUnit\Framework\TestCase;
use \tiglib\math\mod360;


class mod360Test extends TestCase {

    public function test0(){
        $this->assertEquals(0, mod360::compute(0));
        $this->assertEquals(0, mod360::compute(360));
        $this->assertEquals(0, mod360::compute(720));
        $this->assertEquals(0, mod360::compute(-360));
        $this->assertEquals(0, mod360::compute(-720));
    }
    
    public function testPositiveInt(){
        $this->assertEquals(8, mod360::compute(8));
        $this->assertEquals(1, mod360::compute(361));
        $this->assertEquals(90, mod360::compute(450));
        $this->assertEquals(10, mod360::compute(730));
    }
    
    public function testNegativeInt(){
        $this->assertEquals(357, mod360::compute(-3));
        $this->assertEquals(270, mod360::compute(-90));
        $this->assertEquals(180, mod360::compute(-180));
        $this->assertEquals(359, mod360::compute(-361));
    }
    
    public function testPositiveDecimal(){
        $this->assertEquals(8.1, mod360::compute(8.1));
        $this->assertEquals(2.99, round(mod360::compute(362.99), 2));
        $this->assertEquals(2.9, round(mod360::compute(362.9), 1));
        $this->assertEquals(1.4, round(mod360::compute(721.4), 1));
    }
    
    public function testNegativeDecimal(){
        $this->assertEquals(359.9, round(mod360::compute(-0.1), 1));
        $this->assertEquals(269.5, round(mod360::compute(-90.5), 1));
        $this->assertEquals(179.5, round(mod360::compute(-180.5), 1));
    }
    
} // end class
