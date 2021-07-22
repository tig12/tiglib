<?php
/******************************************************************************
    Recursively removes from an array all elements containing null, empty string empty array.
    
    Adaptation of 
    https://stackoverflow.com/questions/7696548/php-how-to-remove-empty-entries-of-an-array-recursively
    by
    https://stackoverflow.com/users/1753349/vedmant
    
    @license    GPL
    @history    2020-08-19 13:35:13+02:00, Thierry Graff : Creation from stackoverflow.com
********************************************************************************/
namespace tiglib\arrays;


class removeEmptyKeys{
    
    /**
        $array is passed by reference
    **/
    public static function compute(&$array){
        return self::array_remove_by_values($array, ['', null, []]);
    }
    
    private static function array_remove_by_values(array $haystack, array $values) {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = self::array_remove_by_values($haystack[$key], $values);
            }
    
            if (in_array($haystack[$key], $values, true)) {
                unset($haystack[$key]);
            }
        }
    
        return $haystack;
    }
}// end class
