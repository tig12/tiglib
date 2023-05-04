/******************************************************************************

    Converts a string DD/MM/YYYY to an array containing [year, month, day].
    WARNING: does not check input parameter
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2023-03-13 11:08:37+01:00, Thierry Graff : Creation
********************************************************************************/
function dateStringFr2ymd(dd_mm_yyyy){
    const d = dd_mm_yyyy.substring(0, 2);
    const m = dd_mm_yyyy.substring(3, 5);
    const y = dd_mm_yyyy.substring(6);
console.log("dateStringFr2ymd - [y, m, d] = ", [y, m, d]);
    return [y, m, d];
}
