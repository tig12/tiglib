<?php
/******************************************************************************
    Like mkdir() but echoes a message if the directory is created on disk.
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2020-05-18 10:38:54+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\filesystem;

class mkdir {
    
   public static function execute(string $dir): void {
        $is_created = @mkdir($dir, 0755, true);
        if($is_created){
            echo "Created directory $dir\n";
        }
   }    

}// end class
