package tiglib

import (
	"testing"
)

func TestNumberFormatInt(t *testing.T) {

	var tests = []struct {
		input     int
		displayed string
		sep       rune
		want      string
	}{
		{1000000, "1000000", ' ', "1 000 000"},
		{1000000, "1000000", ',', "1,000,000"},
		{999, "999", ',', "999"},
		{0, "0", ' ', "0"},
		{-0, "-0", ' ', "0"},
		{+0, "+0", ' ', "0"},
		{-2000, "-2000", ' ', "-2 000"},
	}
	for _, test := range tests {
		if got := NumberFormat(test.input, test.sep); got != test.want {
			t.Errorf("NumberFormat(%s, '%v') should be equal to '%s', got '%s'", test.displayed, test.sep, test.want, got)
		}
	}
}

func TestNumberFormatFloat64(t *testing.T) {

	var tests = []struct {
		input     float64
		displayed string
		sep       rune
		want      string
	}{
		{1200.4, "1200.4", ' ', "1 200.4"},
		{1200.4, "1200.4", ',', "1,200.4"},
		{1200.0, "1200.0", ' ', "1 200"},
		{-12056.0, "-12056.0", ' ', "-12 056"},
		{0.0, "0.0", ' ', "0"},
		{-0.0, "-0.0", ' ', "0"},
		{+0.0, "+0.0", ' ', "0"},
	}
	for _, test := range tests {
		if got := NumberFormat(test.input, test.sep); got != test.want {
			t.Errorf("NumberFormat(%s, '%v') should be equal to '%s', got '%s'", test.displayed, test.sep, test.want, got)
		}
	}
}
