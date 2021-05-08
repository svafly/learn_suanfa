package algo

func BinarySearch(a []int, v int) int {
	len := len(a)
	if len == 0 {
		return -1
	}
	i := 0
	j := len - 1
	for i <= j {
		mid := i + ((j - i) >> 1)
		if a[mid] == v {
			return mid
		} else if a[mid] < v {
			i = mid + 1
		} else {
			j = mid - 1
		}
	}
	return -1
}

func BinarySearchRecursive(a []int, v int) int {
	//二分查找的递归实现
	len := len(a)
	if len == 0 {
		return -1
	}
	return bs(a, v, 0, len-1)
}

func bs(a []int, v, low, high int) int {
	if low > high {
		return -1
	}
	mid := low + (high-low)>>1
	if a[mid] == v {
		return mid
	} else if a[mid] < v {
		return bs(a, v, mid+1, high)
	} else {
		return bs(a, v, low, mid-1)
	}
}

//查找第一个等于给定值的元素
func BinarySearchFirst(a []int, v int) int {
	n := len(a)
	if n == 0 {
		return -1
	}
	low := 0
	high := n - 1
	for low <= high {
		mid := low + (high-low)>>1
		if a[mid] < v {
			low = mid + 1
		} else if a[mid] > v {
			high = mid - 1
		} else {
			if mid == 0 || a[mid-1] != v {
				return mid
			} else {
				high = mid - 1
			}
		}
	}

	return -1
}

//查找最后一个等于给定值的元素
func BinarySearchLast(a []int, v int) int {
	n := len(a)
	if n == 0 {
		return -1
	}
	low := 0
	high := n - 1
	for low <= high {
		mid := low + (high-low)>>1
		if a[mid] > v {
			high = mid - 1
		} else if a[mid] < v {
			low = mid + 1
		} else {
			if mid == n-1 || a[mid+1] != v {
				return mid
			} else {
				low = mid + 1
			}
		}
	}
	return -1
}

//查找第一个大于等于给定值的元素
func BinarySearchFirstGT(a []int, v int) int {
	n := len(a)
	if n == 0 {
		return -1
	}
	low := 0
	high := n - 1
	for low <= high {
		mid := low + (high-low)>>1
		if a[mid] >= v {
			if mid == 0 || a[mid-1] < v {
				return mid
			} else {
				high = mid - 1
			}
		} else {
			low = mid + 1
		}
	}
	return -1
}

//查找最后一个小于等于给定值的元素
func BinarySearchLastGT(a []int, v int) int {
	n := len(a)
	if n == 0 {
		return -1
	}
	low := 0
	high := n - 1
	for low <= high {
		mid := low + (high-low)>>1
		if a[mid] <= v {
			if mid == n-1 || a[mid+1] > v {
				return mid
			} else {
				low = mid + 1
			}
		} else {
			high = mid - 1
		}
	}
	return -1
}
