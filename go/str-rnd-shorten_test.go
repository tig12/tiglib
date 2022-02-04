package tiglib

import "testing"

func TestStrRandomShorten(t *testing.T) {
	str := "6022489e0260daa8ef4af916cf456f07"
	if StrRandomShorten(str, 8) != "589a89f4" {
		t.Error("StrRandomShorten(6022489e0260daa8ef4af916cf456f07) should be equal to 589a89f4")
	}
}
