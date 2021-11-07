<?php
class Solution {

    /**
     * 寻找旋转排序数组中的最小值
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $left=0;
        $right=count($nums)-1;
        while($left<$right){
            if($nums[$left]<$nums[$right])return $nums[$left];
            $mid = floor(($left+$right)/2);
            if($nums[$mid]>=$nums[$left])$left = $mid+1;
            else $right = $mid;
        }
        return $nums[$left];
    }

    //求后继，二分查找
    function findMin2($nums) {
        $left=0;
        $right=count($nums)-1;
        while($left<$right){
            $mid = floor(($left+$right)/2);
            if($nums[$mid]<=$nums[$right]) {
                $right = $mid;
            } else {
                $left = $mid +1;
            }
        }
        return $nums[$right];
    }
}

//数组转化为是否比末尾值大的布尔数组，34512-》00011，那么找第一个最大值即可