/*
@copyright  Thierry Graff
@license    GPL - conforms to file LICENCE located in root directory of current repository.
*/
package tiglib

import "testing"

func TestArraySearch(t *testing.T) {
	a := []string{"a", "b", "c", "d"}
	if ArraySearch(a, "c") != 2 {
		t.Error(`ArraySearch([]string{"a", "b", "c", "d"}, "c") should be = 2`)
	}
}
