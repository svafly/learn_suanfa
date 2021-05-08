package algo

/*冒泡排序*/
func BubbleSort(a []int) {
	for i := 0; i < len(a); i++ {
		isflag := false
		for j := 0; j < len(a)-i-1; j++ {
			if a[j] > a[j+1] {
				a[j], a[j+1] = a[j+1], a[j]
				isflag = true
			}
		}

		if !isflag {
			break
		}
	}
}

/*插入排序*/
func InsertionSort(a []int) {
	for i := 0; i < len(a); i++ {
		value := a[i]
		j := i - 1
		for ; j >= 0; j-- {
			if a[j] > value {
				a[j+1] = a[j]
			} else {
				break
			}
		}
		a[j+1] = value
	}
}

/*选择排序*/
func SelectionSort(a []int) {
	for i := 0; i < len(a); i++ {
		minIndex := i
		for j := i + 1; j < len(a); j++ {
			if a[j] < a[minIndex] {
				minIndex = j
			}
		}
		a[i], a[minIndex] = a[minIndex], a[i]
	}
}

//时间复杂度O(n^2),适合小规模的数据排序
