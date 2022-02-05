/**
    Functions equivalent to php function array_unique().

    Note: depends on in-array.go
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
**/
package tiglib

// Equivalent of php function array_unique for a slice of strings
func ArrayUniqueString(e []string) []string {
	r := []string{}
	for _, s := range e {
		if !InArrayString(s, r[:]) {
			r = append(r, s)
		}
	}
	return r
}

// Equivalent of php function array_unique for a slice of ints
func ArrayUniqueInt(e []int) []int {
	r := []int{}
	for _, s := range e {
		if !InArrayInt(s, r[:]) {
			r = append(r, s)
		}
	}
	return r
}
