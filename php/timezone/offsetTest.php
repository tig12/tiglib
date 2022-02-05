<?php
/******************************************************************************
    Tests for class offset
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2020-07-27 12:16:40+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\timezone;

use PHPUnit\Framework\TestCase;
use tiglib\timezone\offset;

class offsetTest extends TestCase{
    
    public function testCompute(){
        $this->assertEquals( '+02:00', offset::compute('2019-06-20', 'Europe/Paris') );
        $this->assertEquals( '+02:00', offset::compute('2019-06-20 18:45:58', 'Europe/Paris') );
        
        $this->assertEquals( '+01:00', offset::compute('2019-01-20', 'Europe/Paris') );
        $this->assertEquals( '+01:00', offset::compute('2019-01-20 18:45:58', 'Europe/Paris') );
    }
    
    public function testFormat(){
        $this->assertEquals( '+00:00', offset::format(0, 'HH:MM') );
        $this->assertEquals( '+00:00:00', offset::format(0, 'HH:MM:SS') );
        
        $this->assertEquals( '+00:00', offset::format(12, 'HH:MM') );
        $this->assertEquals( '+00:00:12', offset::format(12, 'HH:MM:SS') );
        
        $this->assertEquals( '+00:00', offset::format(-12, 'HH:MM') );
        $this->assertEquals( '-00:00:12', offset::format(-12, 'HH:MM:SS') );
        
        $this->assertEquals( '+01:00', offset::format(3612, 'HH:MM') );
        $this->assertEquals( '+01:00:12', offset::format(3612, 'HH:MM:SS') );
        
        $this->assertEquals( '-01:00', offset::format(-3612, 'HH:MM') );
        $this->assertEquals( '-01:00:12', offset::format(-3612, 'HH:MM:SS') );
        
        $this->assertEquals( '+01:00', offset::format(3599, 'HH:MM') );
        $this->assertEquals( '+00:59:59', offset::format(3599, 'HH:MM:SS') );
        
        $this->assertEquals( '-01:00', offset::format(-3599, 'HH:MM') );
        $this->assertEquals( '-00:59:59', offset::format(-3599, 'HH:MM:SS') );
    }
    
    public function testLg2offset(){
        $this->assertEquals( 240, offset::lg2offset(1) );
        $this->assertEquals( 0, offset::lg2offset(0) );
        $this->assertEquals( 120, offset::lg2offset(0.5) );
        $this->assertEquals( 2976, offset::lg2offset(12.4) );
    }
}