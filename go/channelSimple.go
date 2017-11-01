package main

import "fmt"

func main() {
	natus := make(chan int)
	seq := make(chan int)

	go func() {
		for x := 0; x < 1000; x++ {
			natus <- x
		}
		close(natus)
	}()

	go func() {
		for y := range natus {
			seq <- y * y
		}
		close(seq)
	}()

	for x := range seq {
		fmt.Println(x)
	}
}
