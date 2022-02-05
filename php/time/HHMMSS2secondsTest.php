<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2019-06-03 13:36:48+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\time;

use PHPUnit\Framework\TestCase;
use \tiglib\time\HHMMSS2seconds;


class HHMMSS2secondsTest extends TestCase{

    // ******************************************************
    public function test0(){
        $this->assertEquals( 0, HHMMSS2seconds::compute('00:00') );
        $this->assertEquals( 0, HHMMSS2seconds::compute('00:00:00') );
        $this->assertEquals( 0, HHMMSS2seconds::compute('+00:00') );
        $this->assertEquals( 0, HHMMSS2seconds::compute('+00:00:00') );
        $this->assertEquals( 0, HHMMSS2seconds::compute('-00:00') );
        $this->assertEquals( 0, HHMMSS2seconds::compute('-00:00:00') );
    }
    
    // ******************************************************
    /** 
        Regular use cases
    **/
    public function testNormal(){
        $this->assertEquals( 36000, HHMMSS2seconds::compute('10:00') );
        $this->assertEquals( 36000, HHMMSS2seconds::compute('10:00:00') );
        $this->assertEquals( 36000, HHMMSS2seconds::compute('+10:00') );
        $this->assertEquals( 36000, HHMMSS2seconds::compute('+10:00:00') );
        $this->assertEquals( -36000, HHMMSS2seconds::compute('-10:00') );
        $this->assertEquals( -36000, HHMMSS2seconds::compute('-10:00:00') );
        $this->assertEquals( 1, HHMMSS2seconds::compute('0:0:1') );
        $this->assertEquals( -1, HHMMSS2seconds::compute('-0:0:1') );
        $this->assertEquals( 60, HHMMSS2seconds::compute('0:1') );
        $this->assertEquals( -60, HHMMSS2seconds::compute('-0:1') );
        $this->assertEquals( 86399, HHMMSS2seconds::compute('23:59:59') );
        $this->assertEquals( -86399, HHMMSS2seconds::compute('-23:59:59') );
    }
    
    // ******************************************************
    /**
        Tests if the function works when minuts or hours or seconds are expressed with a single digit
    **/
    public function testDigitsPositive(){
        $this->assertEquals( 3840, HHMMSS2seconds::compute('01:04') );               
        $this->assertEquals( 3841, HHMMSS2seconds::compute('01:04:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('01:04:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('+01:04') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+01:04:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+01:04:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('1:04') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('1:04:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('1:04:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('+1:04') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+1:04:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+1:04:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('01:4') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('01:4:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('01:4:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('+01:4') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+01:4:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+01:4:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('1:4') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('1:4:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('1:4:1') );
        $this->assertEquals( 3840, HHMMSS2seconds::compute('+1:4') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+1:4:01') );
        $this->assertEquals( 3841, HHMMSS2seconds::compute('+1:4:1') );
    }
    
    // ******************************************************
    /**
        Tests if the function works when minuts or hours are expressed with a single digit,
        in case of negative $str
    **/
    public function testDigitsNegative(){
        $this->assertEquals( -7440, HHMMSS2seconds::compute('-02:04') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-02:04:1') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-02:04:01') );
        $this->assertEquals( -7440, HHMMSS2seconds::compute('-2:04') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-2:04:1') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-2:04:01') );
        $this->assertEquals( -7440, HHMMSS2seconds::compute('-02:4') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-02:4:1') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-02:4:01') );
        $this->assertEquals( -7440, HHMMSS2seconds::compute('-2:4') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-2:4:1') );
        $this->assertEquals( -7441, HHMMSS2seconds::compute('-2:4:01') );
    }
    
    // ******************************************************
    /**
        Tests if the function works when separator is a strange string
    **/
    public function testSeparator(){
        $this->assertEquals( 7440, HHMMSS2seconds::compute('02:04') );
        $this->assertEquals( 7441, HHMMSS2seconds::compute('02:04:01') );
        $this->assertEquals( 7440, HHMMSS2seconds::compute('02@04') );
        $this->assertEquals( 7441, HHMMSS2seconds::compute('02@04@01') );
        $this->assertEquals( 7440, HHMMSS2seconds::compute('02 04') );
        $this->assertEquals( 7441, HHMMSS2seconds::compute('02 04 01') );
    }
    
    // ******************************************************
    /**
        Tests that the function return false for different values of $str.
    **/
    public function testFalse(){
        // wrong format
        $this->assertEquals( false, HHMMSS2seconds::compute('12') );
        $this->assertEquals( false, HHMMSS2seconds::compute('@02:04') );
        $this->assertEquals( false, HHMMSS2seconds::compute('02:043') );
        $this->assertEquals( false, HHMMSS2seconds::compute('002:04') );
        $this->assertEquals( false, HHMMSS2seconds::compute('0204') );
        $this->assertEquals( false, HHMMSS2seconds::compute('02:0412') );
        // good format but superior to limits
        $this->assertEquals( false, HHMMSS2seconds::compute('02:74') );
        $this->assertEquals( false, HHMMSS2seconds::compute('02:74:01') );
        $this->assertEquals( false, HHMMSS2seconds::compute('24:12') );
        $this->assertEquals( false, HHMMSS2seconds::compute('24:12:10') );
        $this->assertEquals( false, HHMMSS2seconds::compute('22:12:60') );
        $this->assertEquals( false, HHMMSS2seconds::compute('22:12:-1') );
    }
    
}// end class
