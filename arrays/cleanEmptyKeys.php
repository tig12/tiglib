<?php
/******************************************************************************
    Fills a csv file to an array of associative arrays.
    
    @license    GPL
    @history    2019-06-11 08:49:25+02:00, Thierry Graff : Creation from old code
********************************************************************************/
namespace tiglib\arrays;


class cleanEmptyKeys{
    
    /**
        Removes from an array all elements containing an empty string or an empty array.
        $array is passed by reference, modified inplace
    **/
    public static function compute(&$array){
        $f = function(\Iterator $iterator) {
            echo strtoupper($iterator->current()) . "\n";
            return TRUE;
        };
        $it = new \ArrayIterator($array);
        iterator_apply($it, $f, $array);
        exit;
    }
    
    public static function compute1(&$array){
        foreach($array as $k => $v){
            if(is_array($array[$k])){
                if(count($array[$k]) == 0){
                    unset($array[$k]);
                }
                else{
                    self::compute($array[$k]); // recursive
                }
            }
            else if($array[$k] == ''){
                unset($array[$k]);
            }
        }
    }
    
}// end class
