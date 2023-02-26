/**
    Functions testing if two slices are equal (contain the same elements).
    For slices of bytes, use bytes.Equal().
    
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
**/
package tiglib

// Tests if two slices of comparable types contain the same elements
// Generic function
//func ArraysEqual(a1, a2 []ArrayElement) bool {
func ArraysEqual[T comparable](a1, a2 []T) bool {
	if len(a1) != len(a2) {
		return false
	}
	for i := range a1 {
		if a1[i] != a2[i] {
			return false
		}
	}
	return true
}

// TODO Remove following code and corresponding tests when all client gode is go >= 1.18

// Tests if two slices of strings contain the same elements
func ArraysEqualString(a1, a2 []string) bool {
	if len(a1) != len(a2) {
		return false
	}
	for i := range a1 {
		if a1[i] != a2[i] {
			return false
		}
	}
	return true
}

// Tests if two slices of integers contain the same elements
func ArraysEqualInt(a1, a2 []int) bool {
	if len(a1) != len(a2) {
		return false
	}
	for i := range a1 {
		if a1[i] != a2[i] {
			return false
		}
	}
	return true
}
