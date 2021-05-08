package algo

import (
	"fmt"
	"testing"
)

func TestBinarySearch(t *testing.T) {
	var a []int

	a = []int{1, 3, 5, 6, 8}
	fmt.Println("位置：", BinarySearch(a, 4))
	// if BinarySearch(a, 8) != 4 {
	// 	t.Fatal(BinarySearch(a, 3))
	// }
	// if BinarySearch(a, 4) != -1 {
	// 	t.Fatal(BinarySearch(a, 4))
	// }
}

func TestBinarySearchRecursive(t *testing.T) {
	var a []int

	a = []int{1, 3, 5, 6, 8}
	fmt.Println("位置：", BinarySearchRecursive(a, 3))
}

func TestBinarySearchFirst(t *testing.T) {
	var a []int

	a = []int{1, 2, 2, 2, 3, 4}
	fmt.Println("位置：", BinarySearchFirst(a, 2))
	fmt.Println("位置：", BinarySearchFirst(a, 3))
}

func TestBinarySearchLast(t *testing.T) {
	var a []int

	a = []int{1, 2, 2, 2, 3, 4}
	fmt.Println("位置：", BinarySearchLast(a, 2))
	fmt.Println("位置：", BinarySearchLast(a, 3))
}

func TestBinarySearchFirstGT(t *testing.T) {
	var a []int

	a = []int{1, 2, 2, 2, 3, 4}
	fmt.Println("位置：", BinarySearchFirstGT(a, 2))
	fmt.Println("位置：", BinarySearchFirstGT(a, 1))
	fmt.Println("位置：", BinarySearchFirstGT(a, 3))
	fmt.Println("位置：", BinarySearchFirstGT(a, 4))
}

func TestBinarySearchLastGT(t *testing.T) {
	var a []int

	a = []int{1, 2, 2, 2, 3, 4}
	fmt.Println("位置：", BinarySearchLastGT(a, 2))
	fmt.Println("位置：", BinarySearchLastGT(a, 1))
	fmt.Println("位置：", BinarySearchLastGT(a, 3))
	fmt.Println("位置：", BinarySearchLastGT(a, 4))
}
