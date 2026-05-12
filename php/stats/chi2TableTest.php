<?php
/******************************************************************************

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2026-04-15 08:46:10+01:00, Thierry Graff : Creation
********************************************************************************/

namespace tiglib\stats;

use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class chi2TableTest extends TestCase{
    
    public function test1(){
        $N = 4;
        $M = 3;
        $a = [
            [9, 12, 11, 14],   // 46
            [6, 12, 10, 10],   // 38
            [9, 12, 10, 13],   // 44
         //  24 36  31  37        128
        ];
/* 
calc 9+12+11+14
calc 6+12+10+10
calc 9+12+10+13

calc 9+6+9
calc 12+12+12
calc 11+10+10
calc 14+10+13

calc 9+12+11+14+6+12+10+10+9+12+10+13
*/
        $sums_i = [46, 38, 44];
        $sums_j = [24, 36, 31, 37];
        $sum = 128;
        $theo = [
            [46*24/128, 46*36/128, 46*31/128, 46*37/128],
            [38*24/128, 38*36/128, 38*31/128, 38*37/128],
            [44*24/128, 44*36/128, 44*31/128, 44*37/128],
        ];
        $diff = [
            [9-46*24/128, 12-46*36/128, 11-46*31/128, 14-46*37/128],
            [6-38*24/128, 12-38*36/128, 10-38*31/128, 10-38*37/128],
            [9-44*24/128, 12-44*36/128, 10-44*31/128, 13-44*37/128],
        ];
// TODO $diff_percent
        $c2 = [
            [pow(9-46*24/128, 2)/(46*24/128), pow(12-46*36/128, 2)/(46*36/128), pow(11-46*31/128, 2)/(46*31/128), pow(14-46*37/128, 2)/(46*37/128)],
            [pow(6-38*24/128, 2)/(38*24/128), pow(12-38*36/128, 2)/(38*36/128), pow(10-38*31/128, 2)/(38*31/128), pow(10-38*37/128, 2)/(38*37/128)],
            [pow(9-44*24/128, 2)/(44*24/128), pow(12-44*36/128, 2)/(44*36/128), pow(10-44*31/128, 2)/(44*31/128), pow(13-44*37/128, 2)/(44*37/128)],
        ];
        $chi2 =
            pow(9-46*24/128, 2)/(46*24/128) + pow(12-46*36/128, 2)/(46*36/128) + pow(11-46*31/128, 2)/(46*31/128) + pow(14-46*37/128, 2)/(46*37/128) +
            pow(6-38*24/128, 2)/(38*24/128) + pow(12-38*36/128, 2)/(38*36/128) + pow(10-38*31/128, 2)/(38*31/128) + pow(10-38*37/128, 2)/(38*37/128) +
            pow(9-44*24/128, 2)/(44*24/128) + pow(12-44*36/128, 2)/(44*36/128) + pow(10-44*31/128, 2)/(44*31/128) + pow(13-44*37/128, 2)/(44*37/128);
        
        $got = chi2Table::compute($a, round:5, test:true);
        
        $this->assertEquals($got['sum'], $sum);
        
        $this->assertEquals($got['sums_i'], $sums_i); // test equality of each element of the array
        
        $this->assertEquals($got['sums_j'], $sums_j); // test equality of each element of the array
        
        for($i=0; $i < $M; $i++){
            for($j=0; $j < $N; $j++){
                $this->assertEquals(round($got['theo'][$i][$j], 5), round($theo[$i][$j], 5));
            }
        }
        
        for($i=0; $i < $M; $i++){
            for($j=0; $j < $N; $j++){
                $this->assertEquals(round($got['diff'][$i][$j], 5), round($diff[$i][$j], 5));
            }
        }
        
        for($i=0; $i < $M; $i++){
            for($j=0; $j < $N; $j++){
//                $this->assertEquals(round($got['diff_percent'][$i][$j], 5), round($diff_percent[$i][$j], 5));
            }
        }
        
        for($i=0; $i < $M; $i++){
            for($j=0; $j < $N; $j++){
                $this->assertEquals(round($got['c2'][$i][$j], 5), round($c2[$i][$j], 5));
            }
        }
        
        $this->assertEquals($got['chi2'], $chi2);
    }
    
} // end class
