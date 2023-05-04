/**
    Functions equivalent to php function in_array().
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
**/
package tiglib

// Equivalent of php function in_array for a slice - generic version
func InArray[T comparable](elt T, array []T) bool {
	for _, test := range array {
		if elt == test {
			return true
		}
	}
	return false
}


// obsolete (keep for go < 1.18)

// Equivalent of php function in_array for a slice of strings
func InArrayString(elt string, array []string) bool {
	for _, test := range array {
		if elt == test {
			return true
		}
	}
	return false
}

// Equivalent of php function in_array for a slice of ints
func InArrayInt(elt int, array []int) bool {
	for _, test := range array {
		if elt == test {
			return true
		}
	}
	return false
}
