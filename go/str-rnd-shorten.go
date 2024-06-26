/*
Shortens a string by randomly keeping a subset of its characters.
Ex: StrRandomShorten("6022489e0260daa8ef4af916cf456f07", 8) returns "589a89f4"
rand.Seed() is not called, so different executions for a given string return the same result.

Bug?
Calling rand.Seed(1) in order to always obtain the same result
is necessary on debian 10 go 1.17.1 - but not on ubuntu 20.4 go 1.17

@param      str         String to shorten
@param      finalLen    Length of the string after shortening

@copyright  Thierry Graff
@license    GPL - conforms to file LICENCE located in root directory of current repository.
*/
package tiglib

import (
	"math/rand"
)

func StrRandomShorten(str string, finalLen int) string {
	var res = make([]byte, finalLen)
	l := len(str) - 1
	rand.Seed(1)
	for i := 0; i < finalLen; i++ {
		res[i] = str[rand.Intn(l)]
	}
	return string(res)
}
