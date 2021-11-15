<?php
class Solution {

    /**
     * 乘积最大子数组
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $n = count($nums);
        $fmax[0] = $nums[0];
        $fmin[0] = $nums[0];
        for($i=1;$i<$n;$i++){
            $fmax[$i] = max(max($fmax[$i-1]*$nums[$i],$fmin[$i-1]*$nums[$i]),$nums[$i]);
            $fmin[$i] = min(min($fmax[$i-1]*$nums[$i],$fmin[$i-1]*$nums[$i]),$nums[$i]);
        }
        return max($fmax);
    }
}