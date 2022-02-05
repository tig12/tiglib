/**
    Code coming from
    https://stackoverflow.com/questions/1026069/how-do-i-make-the-first-letter-of-a-string-uppercase-in-javascript
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2021-11-01 10:48:09+01:00, Thierry Graff : Creation
**/
function ucfirst(s){
    return s[0].toUpperCase() + s.substring(1);
}
