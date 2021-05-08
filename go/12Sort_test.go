package algo

import (
	"fmt"
	"math/rand"
	"testing"
)

func createRandomArr(length int) []int {
	arr := make([]int, length, length)
	for i := 0; i < length; i++ {
		arr[i] = rand.Intn(100)
	}
	return arr
}

func TestMergeSort(t *testing.T) {
	arr := []int{1, 5, 9, 6, 3, 7, 5, 10}
	fmt.Println("归并排序前：", arr)
	MergeSort(arr)
	fmt.Println("归并排序后：", arr)
}

func TestQuickSort(t *testing.T) {
	arr := []int{7, 2, 1, 6, 8, 5, 3, 4}
	fmt.Println("快速排序前：", arr)
	QuickSort(arr)
	fmt.Println("快速排序后：", arr)

	// arr = createRandomArr(100)
	// QuickSort(arr)
	// t.Log(arr)
}
