/******************************************************************************
    Returns the list of keys of a map.
    Keys must be strings.

    NOT USED because interface{} can't replace all types.

    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
    
    @history    2020-01-16 15:19:29+01:00, Thierry Graff : Creation
********************************************************************************/

package tiglib

func Keys(m map[string]interface{}) []string {
	keys := make([]string, len(m))
	i := 0
	for k, _ := range m {
		keys[i] = k
		i++
	}
	return keys
}
