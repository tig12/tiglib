<?php
/******************************************************************************

    @license    GPL
    @history    2019-06-03 13:36:48+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\time;

use PHPUnit\Framework\TestCase;
use \tiglib\time\seconds2HHMMSS;


class seconds2HHMMSSTest extends TestCase{

    public function test0(){
        $this->assertEquals( '00:00:00', seconds2HHMMSS::compute(0) );
        $this->assertEquals( '00:00:00', seconds2HHMMSS::compute(0.4) );
        $this->assertEquals( '00:00:01', seconds2HHMMSS::compute(0.5) );
        
        $this->assertEquals( '00:00', seconds2HHMMSS::compute(0, true) );
        $this->assertEquals( '00:00', seconds2HHMMSS::compute(29.9, true) );
        $this->assertEquals( '00:01', seconds2HHMMSS::compute(30, true) );
    }
    
    public function testRoundToSecond(){
        $this->assertEquals( '00:00:00', seconds2HHMMSS::compute(0, false, false) );
        $this->assertEquals( '00:00:29.9', seconds2HHMMSS::compute(29.9, false, false) );
        $this->assertEquals( '00:00:30', seconds2HHMMSS::compute(30, false, false) );
    }
    
    public function testNegative(){
        $this->assertEquals( seconds2HHMMSS::compute(-29.9, false, false), seconds2HHMMSS::compute(29.9, false, false) );
        $this->assertEquals( seconds2HHMMSS::compute(-29.9, false), seconds2HHMMSS::compute(29.9, false) );
        $this->assertEquals( seconds2HHMMSS::compute(-29.9), seconds2HHMMSS::compute(29.9) );
    }
    
    
}// end class
