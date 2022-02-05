<?php
/******************************************************************************
    Like sleep() but parameter is a nb of seconds, and it prints a message.
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2019-06-11 06:37:11+02:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\misc;

class dosleep{
    
    /** 
        Like sleep() but also prints a message.
        @param  $x  Nb of seconds ; can be integer or decimal
    **/
    public static function execute($x){
        echo "dosleep($x) ";
        usleep($x * 1000000);
        echo " - end sleep\n";
    }

}// end class
