<?php
class Solution {

    /**
     * 最大子序和
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $n = count($nums);
        $dp[0]=$nums[0];
        for($i=1;$i<$n;$i++) {
            $dp[$i] = max($dp[$i-1]+$nums[$i],$nums[$i]);
        }
        return max($dp);
    }
}

//和递增就继续加，否则另起