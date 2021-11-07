<?php
class Solution {

    /**
     * 在排序数组中查找元素的第一个和最后一个位置
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $ans=[];
        //第一个>=target的数
        //最后一个<=target的数
        $left = 0;
        $right = count($nums);
        while($left<$right) {
            $mid = floor(($left+$right)/2);
            if($nums[$mid]>=$target) {
                $right = $mid;
            } else {
                $left = $mid+1;
            }
        }
        $ans[]=$right;

        $left = -1;
        $right = count($nums)-1;
        while($left<$right) {
            //这里向上取整，避免两个数组时死循环的问题
            $mid = ceil(($left+$right)/2);
            if($nums[$mid]<=$target) {
                $left = $mid;
            } else {
                $right = $mid-1;
            }
        }
        $ans[] = $right;
        if($ans[0]>$ans[1])return[-1,-1];
        return $ans;
    }
}