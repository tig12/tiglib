<?php
/******************************************************************************

    @license    GPL
    @history    2019-06-11 12:13:18+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\arrays;

use PHPUnit\Framework\TestCase;
use tiglib\arrays\sortByKey;


class flattenAssociativeTest extends TestCase{
    
    public function test1(){
        $arr = [
            'single1' => 12,
            'name' => [
                'family' => 'toto',
                'given' => 'titi',
                'official' => [
                    'family' => 'toto official',
                    'given' => 'titi official',
                ],
            ],
            'single2' => 'another',
            'very-nested' =>[
                'test1' => [
                    'test2' => [
                        'test3' => [
                            'test4' => [
                                'test5' => 'ok',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        
        $res = [
            'single1' => 12,
            'name.family' => 'toto',
            'name.given' => 'titi',
            'name.official.family' => 'toto official',
            'name.official.given' => 'titi official',
            'single2' => 'another',
            'very-nested.test1.test2.test3.test4.test5' => 'ok',
        ];
        
        $this->assertEquals( $res, flattenAssociative::compute($arr) );
    }
    
}// end class
