/**
    @copyright  Thierry Graff
    @license    GPL - conforms to file LICENCE located in root directory of current repository.
**/
package tiglib

import "testing"

// for generic version
func TestInArray(t *testing.T) {
	arr := []string{"a", "b", "brt"}
	if !InArray("b", arr) {
		t.Error("b should belong to {a, b, brt}")
	}
	if InArray("r", arr) {
		t.Error("r should not belong to {a, b, brt}")
	}

	arr2 := []int{1, 4, 8, 12}
	if !InArray(4, arr2) {
		t.Error("4 should belong to {1, 4, 8, 12}")
	}
	if InArray(2, arr2) {
		t.Error("2 should not belong to {1, 4, 8, 12}")
	}
}

// for non generic versions
func TestInArray_old(t *testing.T) {
	arr := []string{"a", "b", "brt"}
	if !InArrayString("b", arr) {
		t.Error("b should belong to {a, b, brt}")
	}
	if InArrayString("r", arr) {
		t.Error("r should not belong to {a, b, brt}")
	}

	arr2 := []int{1, 4, 8, 12}
	if !InArrayInt(4, arr2) {
		t.Error("4 should belong to {1, 4, 8, 12}")
	}
	if InArrayInt(2, arr2) {
		t.Error("2 should not belong to {1, 4, 8, 12}")
	}
}
