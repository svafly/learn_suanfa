package algo

import (
	"fmt"
	"testing"
)

func TestBubbleSort(t *testing.T) {
	arr := []int{1, 5, 9, 6, 3, 7, 5, 10}
	fmt.Println("冒泡排序前：", arr)
	BubbleSort(arr)
	fmt.Println("排序后：", arr)
}

func TestInsertionSort(t *testing.T) {
	arr := []int{1, 5, 9, 6, 3, 7, 5, 10}
	fmt.Println("插入排序前：", arr)
	InsertionSort(arr)
	fmt.Println("排序后：", arr)
}

func TestSelectionSort(t *testing.T) {
	arr := []int{1, 5, 9, 6, 3, 7, 5, 10}
	fmt.Println("选择排序前：", arr)
	SelectionSort(arr)
	fmt.Println("选择排序后：", arr)
}
