/*
Functions equivalent to php function in_array().

Became useless, use instead:
golang.org/x/exp/slices.Contains()

@copyright  Thierry Graff
@license    GPL - conforms to file LICENCE located in root directory of current repository.
*/
package tiglib

// InArray is equivalent of php function in_array for a slice - generic version
func InArray[T comparable](elt T, array []T) bool {
	for _, test := range array {
		if elt == test {
			return true
		}
	}
	return false
}
