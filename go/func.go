package main

import "fmt"

func plus(x int, y int) int {
	return x + y
}

func main() {
	fmt.Println(plus(1, plus(100, 50))) // 151
}
