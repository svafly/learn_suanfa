<?php
class Solution {

    /**
     * 峰值查找
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $left=0;
        $right=count($nums)-1;
        while($left < $right){
            $lmid = floor(($left+$right)/2);
            $rmid = $lmid+1;
            if($nums[$lmid]<=$nums[$rmid])$left = $lmid+1;
            else {
                $right = $rmid-1;
            }
        }
        return $right;
    }
}

//三分查找，取左右两个中值，如果左>右，则峰值不可能在右值右边；反之则排除左边