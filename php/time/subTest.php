<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2023-02-25 02:40:53+01:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\time;

use PHPUnit\Framework\TestCase;
use \tiglib\time\sub;


class subTest extends TestCase{

//    const ECHO_ERRORS = true;
    const ECHO_ERRORS = false;
    
    public function testValidCalls(){
        if(self::ECHO_ERRORS){ echo "\n"; }
        $this->assertEquals(sub::execute('2023-02-25 12:40', '+01:00'), '2023-02-25 11:40' );
        $this->assertEquals(sub::execute('2023-02-25 12:40', '-01:00'), '2023-02-25 13:40' );
        $this->assertEquals(sub::execute('2023-02-25 12:40', '+01:00:20'), '2023-02-25 11:39:40' );
        $this->assertEquals(sub::execute('2023-02-25 12:40:23', '+01:00'), '2023-02-25 11:40:23' );
        $this->assertEquals(sub::execute('2023-02-25 12:40:01', '-01:00:20'), '2023-02-25 13:40:21' );
    }
    
    public function testChangeDate(){
        $this->assertEquals(sub::execute('2023-02-25 00:40', '+01:00'), '2023-02-24 23:40' );
        $this->assertEquals(sub::execute('2023-02-25 23:40', '-01:12'), '2023-02-26 00:52' );
    }
    
    /** 
        Test a bit useless, as it just checks the exceptions thrown by DateTime constructor
    **/
    public function testInvalidDate(){
        if(self::ECHO_ERRORS){ echo "\n"; }
        // invalid year not tested as handled by class add
        //
        // invalid month
        //
        try{
            $str = '2023-13-18 15:40';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
        // invalid month - zero
        try{
            $str = '2023-00-18 15:40';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
        //
        // invalid day
        //
        try{
            $str = '2023-02-38 15:40';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
        // invalid day - zero
        try{
            $str = '2023-02-00 15:40';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
        //
        // invalid hour
        //
        try{
            $str = '2023-02-25 45:40';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
        //
        // invalid minute
        //
        try{
            $str = '2023-02-25 12:80';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
        //
        // invalid second
        //
        try{
            $str = '2023-02-25 12:40:80';
            $this->assertEquals(sub::execute($str, '+01:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
            if(self::ECHO_ERRORS){ echo $str . ' ' . $e->getMessage() . "\n"; }
        }
    }
    
    public function testInvalidOffset(){
        try{
            $this->assertEquals(sub::execute('2023-02-25 12:40', '+25:00'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
        }
        try{
            $this->assertEquals(sub::execute('2023-02-25 12:40', '+20:80'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
        }
        try{
            $this->assertEquals(sub::execute('2023-02-25 12:40', '+20:40:80'), '0' );
        }
        catch(\Exception $e){
            $this->assertTrue($e instanceof \Exception);
        }
    }
    
    
}// end class
