/*
   Note: depends on array-equal.go

   @copyright  Thierry Graff
   @license    GPL - conforms to file LICENCE located in root directory of current repository.
*/

package tiglib

import "testing"

func TestArrayUniqueString(t *testing.T) {
	a1 := []string{"a", "a", "b"}
	a2 := []string{"a", "b"}
	a3 := []string{}
	uniq1 := ArrayUnique(a1)
	uniq2 := ArrayUnique(a2)
	uniq3 := ArrayUnique(a3)
	if !ArraysEqual(uniq1, a2) {
		t.Error(`ArrayUnique({"a", "a", "b"}) should be = to {"a", "b"}`)
	}
	if !ArraysEqual(uniq2, a2) {
		t.Error(`ArrayUnique({"a", "b"}) should be = to {"a", "b"}`)
	}
	if !ArraysEqual(uniq3, a3) {
		t.Error(`ArrayUnique({}) should be = to {}`)
	}
}

func TestArrayUniqueInt(t *testing.T) {
	a1 := []int{1, 1, 2}
	a2 := []int{1, 2}
	a3 := []int{}
	uniq1 := ArrayUnique(a1)
	uniq2 := ArrayUnique(a2)
	uniq3 := ArrayUnique(a3)
	if !ArraysEqual(uniq1, a2) {
		t.Error(`ArrayUnique({1, 1, 2}) should be = to {1, 2}`)
	}
	if !ArraysEqual(uniq2, a2) {
		t.Error(`ArrayUnique({1, 2}) should be = to {1, 2}`)
	}
	if !ArraysEqual(uniq3, a3) {
		t.Error(`ArrayUnique({}) should be = to {}`)
	}
}
