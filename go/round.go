/**
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
**/
package tiglib

import "math"

func Round(x float64, precision int) float64 {
	x = x * math.Pow10(precision)
	x = math.Round(x)
	return x / math.Pow10(precision)
}
