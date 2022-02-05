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
        $this->assertEquals( 0, mod360::compute(0) );
        $this->assertEquals( 0, mod360::compute(360) );
//        $this->assertEquals( 0, mod360::compute(-360) );
    }
    
    public function testPositive(){
        $this->assertEquals( 80, mod360::compute(80) );
        $this->assertEquals( 1, mod360::compute(361) );
    }
    
    public function testNegative(){
        $this->assertEquals( 120, mod360::compute(-240) );
        $this->assertEquals( 1, mod360::compute(-359) );
    }
    
} // end class
