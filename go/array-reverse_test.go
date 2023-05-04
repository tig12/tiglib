/**
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
**/
package tiglib

import "testing"

func TestArrayReverse(t *testing.T) {
	a := []string{"a", "b", "c", "d"}
    ArrayReverse(a)
	if a[0] != "d" || a[1] != "c" || a[2] != "b" || a[3] != "a" {
		t.Error(`ArrayReverse([]string{"a", "b", "c", "d"}) should be = []string{"d", "c", "b", "a"}`)
	}
}
