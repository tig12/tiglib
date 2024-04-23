<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2021-05-12 02:06:50+01:00, Thierry Graff : Creation
********************************************************************************/
namespace tiglib\arrays;

class yieldCsv{
    
    /**
        Generator function to read a csv file line by line.
        Each line of the file is yielded as a regular array.
        All lines of the csv file must have the same number of fields (no check is done).
        Usage :
            $lines = yieldCsv::loop($filename);
            foreach($lines as $line){
                // $line is a regular array
            }
        @param      $filename Absolute path to the csv file
        @param      $delimiter field delimiter used in the csv file.
    **/
    public static function loop($filename, $separator=';'){
        if (!$fileHandle = fopen($filename, 'r')) {
            return false;
        }
        while (false !== $line = fgets($fileHandle)) {
            $tmp = explode($separator, $line);
            yield $tmp;
        }
        fclose($fileHandle);
    }
    
} // end class
