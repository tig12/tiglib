<?php
/******************************************************************************
    Tests for class offset_it
    
    @todo phpunit
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2020-07-27 12:16:40+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\timezone;

use PHPUnit\Framework\TestCase;
use tiglib\timezone\offset;

class offset_itTest extends TestCase{                                                                                   

    public function testPhpDefault(){
        $this->assertEquals( ['+02:00', '', 6], offset_it::compute('2019-06-20 12:39:00', 12.5, 'RM') );
        $this->assertEquals( ['+02:00', '', 6], offset_it::compute('1919-06-20 12:39:00', 12.5, 'RM') );
    }

    public function testRomaBefore1885(){
        $this->assertEquals(
            ['', offset_it::MSG_ROMA_BEFORE_1885, offset_it::CASE_ROMA_BEFORE_1885], 
            offset_it::compute('1884-12-12', 12.5, 'RM')
        );
    }
    
    public function testNotRomaBefore1866(){
        // 53*60 + 31 = 3211 and 13.38*240 = 3211.2                               
        $this->assertEquals(
            ['+00:53:31', '', offset_it::CASE_NOT_ROMA_BEFORE_1866], 
            offset_it::compute('1856-12-12', 13.38, 'PA', 'HH:MM:SS')
        );
    }
    
    public function testBetween1866and1893(){
        // Sicilia
        $this->assertEquals(
            ['+00:53:28', '', offset_it::CASE_BETWEEN_1866_AND_1893], 
            offset_it::compute('1884-12-12', 13.38, 'PA', 'HH:MM:SS')
        );
        $this->assertEquals(
            ['+00:53:28', '', offset_it::CASE_BETWEEN_1866_AND_1893], 
            offset_it::compute('1884-12-12', 13.58, 'AG', 'HH:MM:SS')
        );
        // Sardegna
        $this->assertEquals(
            ['+00:36:24', '', offset_it::CASE_BETWEEN_1866_AND_1893], 
            offset_it::compute('1884-12-12', 9.12, 'CA', 'HH:MM:SS')
        );
        // Rest of Italy
        $this->assertEquals(
            ['+00:49:56', '', offset_it::CASE_BETWEEN_1866_AND_1893], 
            offset_it::compute('1886-12-12', 12.5, 'RM', 'HH:MM:SS')
        );
    }
    
    public function testBetween1893and1916(){
        $this->assertEquals(
            ['+01:00:00', '', offset_it::CASE_BETWEEN_1893_AND_1916], 
            offset_it::compute('1904-12-12', 12.5, 'RM', 'HH:MM:SS')
        );
    }

    public function testWW2(){
        $this->assertEquals(
            ['', offset_it::MSG_WW2, offset_it::CASE_WW2], 
            offset_it::compute('1943-08-12', 12.5, 'RM', 'HH:MM:SS')
        );
    }

}
