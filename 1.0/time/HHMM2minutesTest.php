<?php
/******************************************************************************

    @license    GPL
    @history    2019-06-03 13:36:48+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\time;

use PHPUnit\Framework\TestCase;
use \tiglib\time\HHMM2minutes;


class HHMM2minutesTest extends TestCase{

    // ******************************************************
    public function test0(){
        $this->assertEquals( 0, HHMM2minutes::compute('+00:00') );
        $this->assertEquals( 0, HHMM2minutes::compute('+00:00') );
        $this->assertEquals( 0, HHMM2minutes::compute('-00:00') );
    }
    
    // ******************************************************
    /** 
        Regular use cases
    **/
    public function testNormal(){
        $this->assertEquals( 754, HHMM2minutes::compute('12:34') );
        $this->assertEquals( 754, HHMM2minutes::compute('+12:34') );
        $this->assertEquals( -754, HHMM2minutes::compute('-12:34') );
        $this->assertEquals( 1, HHMM2minutes::compute('0:1') );
        $this->assertEquals( 1439, HHMM2minutes::compute('23:59') );
    }
    
    // ******************************************************
    /**
        Tests if the function works when minuts or hours are expressed with a single digit
    **/
    public function testDigitsPositive(){
        $this->assertEquals( 124, HHMM2minutes::compute('02:04') );
        $this->assertEquals( 124, HHMM2minutes::compute('+02:04') );
        $this->assertEquals( 124, HHMM2minutes::compute('2:04') );
        $this->assertEquals( 124, HHMM2minutes::compute('+2:04') );
        $this->assertEquals( 124, HHMM2minutes::compute('02:4') );
        $this->assertEquals( 124, HHMM2minutes::compute('+02:4') );
        $this->assertEquals( 124, HHMM2minutes::compute('2:4') );
        $this->assertEquals( 124, HHMM2minutes::compute('+2:4') );
    }
    
    // ******************************************************
    /**
        Tests if the function works when minuts or hours are expressed with a single digit,
        in case of negative $str
    **/
    public function testDigitsNegative(){
        $this->assertEquals( -124, HHMM2minutes::compute('-02:04') );
        $this->assertEquals( -124, HHMM2minutes::compute('-2:04') );
        $this->assertEquals( -124, HHMM2minutes::compute('-02:4') );
        $this->assertEquals( -124, HHMM2minutes::compute('-2:4') );
    }
    
    // ******************************************************
    /**
        Tests if the function works when separator is a strange string
    **/
    public function testSeparator(){
        $this->assertEquals( 124, HHMM2minutes::compute('02:04') );
        $this->assertEquals( 124, HHMM2minutes::compute('02@04') );
        $this->assertEquals( 124, HHMM2minutes::compute('02 04') );
    }
    
    // ******************************************************
    /**
        Tests that the function return false for different values of $str.
    **/
    public function testFalse(){
        // wrong format
        $this->assertEquals( false, HHMM2minutes::compute('12') );
        $this->assertEquals( false, HHMM2minutes::compute('@02:04') );
        $this->assertEquals( false, HHMM2minutes::compute('02:043') );
        $this->assertEquals( false, HHMM2minutes::compute('002:04') );
        $this->assertEquals( false, HHMM2minutes::compute('0204') );
        // good format but superior to limits
        $this->assertEquals( false, HHMM2minutes::compute('02:74') );
        $this->assertEquals( false, HHMM2minutes::compute('24:12') );
    }
    
    
    
}// end class
