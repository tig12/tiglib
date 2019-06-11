<?php
/******************************************************************************

    @license    GPL
    @history    2019-06-11 12:13:18+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\arrays;

use PHPUnit\Framework\TestCase;
use tiglib\arrays\sortByKey;


class sortByKeyTest extends TestCase{
    
    // setup() useless as the array is directly initialized.
    private $arr = [
        [
            'name' => 'a third name',
            'date' => '2018-12-13',
        ],    
        [
            'name' => 'a first name',
            'date' => '2018-12-12',
        ],    
        [
            'name' => 'a second name',
            'date' => '2017-12-12',
        ],    
    ];
    
    // ******************************************************
    public function testName(){
        $wanted = [
            [
                'name' => 'a first name',
                'date' => '2018-12-12',
            ],    
            [
                'name' => 'a second name',
                'date' => '2017-12-12',
            ],    
            [
                'name' => 'a third name',
                'date' => '2018-12-13',
            ],    
        ];
        $this->assertEquals( $wanted, sortByKey::compute($this->arr, 'name') );
    }
    
    // ******************************************************
    public function testDate(){
        $wanted = [
            [
                'name' => 'a second name',
                'date' => '2017-12-12',
            ],    
            [
                'name' => 'a first name',
                'date' => '2018-12-12',
            ],    
            [
                'name' => 'a third name',
                'date' => '2018-12-13',
            ],    
        ];
        $this->assertEquals( $wanted, sortByKey::compute($this->arr, 'date') );
    }
    
}// end class
