package main

/*import "fmt"*/
import (
	"fmt"
	"reflect"
)

func main() {
	fmt.Println("Hello World")
	var b byte = 'D'
	fmt.Printf("output: %v\n", reflect.TypeOf(b).Kind())
}
