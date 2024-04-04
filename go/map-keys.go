/*
@copyright  Thierry Graff
@license    GPL - conforms to file LICENCE located in root directory of current repository.
*/
package tiglib

// MapKeys returns a slice containing the keys of a map - generic version.
func MapKeys[T comparable, U interface{}](m map[T]U) (keys []T) {
	keys = make([]T, len(m))
	i := 0
	for k := range m {
		keys[i] = k
		i++
	}
	return keys
}

// obsolete - for go < 1.18

// MapKeysStringInt returns a slice containing the keys of a map[string]int
func MapKeysStringInt(m map[string]int) (keys []string) {
	keys = make([]string, len(m))
	i := 0
	for k := range m {
		keys[i] = k
		i++
	}
	return keys
}
