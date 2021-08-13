package tiglib

import (
    "testing"
)
func TestNumberFormat(t *testing.T) {
    n := 1000000
    s := NumberFormat(n, ' ')
	if s != "1 000 000" {
		t.Error("NumberFormat(1000000, ' ') should be equal to '1 000 000'")
	}
    s = NumberFormat(n, ',')
	if s != "1,000,000" {
		t.Error("NumberFormat(1000000, ',') should be equal to '1,000,000'")
	}
	n = 999
    s = NumberFormat(n, ',')
	if s != "999" {
		t.Error("NumberFormat(999, ',') should be equal to '999'")
	}
    
}

