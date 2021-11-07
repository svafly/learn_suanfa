<?php
class Solution {

    /**
     * 寻找旋转排序数组中的最小值II
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $left = 0;
        $right = count($nums)-1;
        while($left<$right){
            $mid = floor(($left+$right)/2);
            if ($nums[$mid]<$nums[$right]) {
                $right = $mid;
            } elseif ($nums[$mid]>$nums[$right]) {
                $left = $mid+1;
            } else {
                $right--;
            }
        }
        return $nums[$right];
    }
}

//当中值等于right时，最小值肯定在right的右边，所以-1