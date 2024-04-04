/*
Function equivalent to php function array_intersect().

Generic version of a function found on
https://siongui.github.io/2018/03/09/go-match-common-element-in-two-array/

@copyright  Thierry Graff
@license    GPL - conforms to file LICENCE located in root directory of current repository.
*/
package tiglib

// ArrayIntersect computes intersection of 2 slices.
// Equivalent of php function array_intersect (for 2 arrays).
func ArrayIntersect[T comparable](a, b []T) []T {
	m := make(map[T]bool)
	for _, item := range a {
		m[item] = true
	}
	var c []T
	for _, item := range b {
		if _, ok := m[item]; ok {
			c = append(c, item)
		}
	}
	return c
}
