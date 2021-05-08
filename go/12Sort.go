package algo

/*归并排序*/
func MergeSort(arr []int) {
	n := len(arr)
	if n < 2 {
		return
	}

	mergeSort(arr, 0, n-1)
}

func mergeSort(arr []int, start, end int) {
	if start >= end {
		return
	}
	mid := (start + end) / 2
	mergeSort(arr, start, mid)
	mergeSort(arr, mid+1, end)
	merge(arr, start, mid, end)
}

func merge(arr []int, start, mid, end int) {
	i := start
	j := mid + 1
	k := 0
	tmpArr := make([]int, end-start+1)
	for ; i <= mid && j <= end; k++ {
		if arr[i] <= arr[j] {
			tmpArr[k] = arr[i]
			i++
		} else {
			tmpArr[k] = arr[j]
			j++
		}
	}
	for ; i <= mid; i++ {
		tmpArr[k] = arr[i]
		k++
	}
	for ; j <= end; j++ {
		tmpArr[k] = arr[j]
		k++
	}
	copy(arr[start:end+1], tmpArr)
}

/*快速排序*/
func QuickSort(arr []int) {
	quickSort(arr, 0, len(arr)-1)
}

func quickSort(arr []int, start, end int) {
	if start >= end {
		return
	}
	partitionIndex := partition(arr, start, end)
	quickSort(arr, start, partitionIndex-1)
	quickSort(arr, partitionIndex+1, end)
}

func partition(arr []int, start, end int) int {
	pivot := arr[end]
	pIndex := start
	for i := start; i < end; i++ {
		if arr[i] <= pivot {
			arr[i], arr[pIndex] = arr[pIndex], arr[i]
			pIndex++
		}
	}
	arr[end], arr[pIndex] = arr[pIndex], arr[end]
	return pIndex
}

//时间复杂度O(nlogn),适合大规模的数据排序，比较常用
