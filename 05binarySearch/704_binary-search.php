<?php
class Solution {

    /**
     * 二分查找
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $left = 0;
        $right = count($nums)-1;
        while($left<=$right) {
            $mid = floor($left+($right-$left)/2);
            if ($target == $nums[$mid])return $mid;
            if ($target>$nums[$mid]) {
                $left = $mid+1;
            } else {
                $right = $mid-1;
            }
        }
        return -1;
    }
}