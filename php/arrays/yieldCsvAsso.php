<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2021-05-12 02:19:55+01:00, Thierry Graff : Creation
********************************************************************************/
namespace tiglib\arrays;

class yieldCsvAsso {
    
    /**
        Generator function to read a csv file line by line.
        Each line of the file is yielded as an associative array (except the first line).
        The first line of the csv file must contain the field names (no check is done).
        All lines of the csv file must have the same number of fields (no check is done).
        Usage :
            $lines = yieldCsv::loop($filename);
            foreach($lines as $line){
                // $line is an associative array
            }
        @param  $filename Absolute path to the csv file
        @param  $sep Field separator in the input file.
    **/
    public static function loop($filename, $sep=';'){
        if (!$fileHandle = fopen($filename, 'r')) {
            return false;
        }
        // first line, field names
        $line = fgets($fileHandle);
        $fieldnames = array_map('trim', explode($sep, $line));
        
        while (false !== $line = fgets($fileHandle)) {
            $tmp = explode($sep, $line);
            $res = [];
            for($i=0; $i < count($tmp); $i++){
                $res[$fieldnames[$i]] = $tmp[$i];
            }
            yield $res;
        }
        fclose($fileHandle);
    }
    
} // end class
