<?php
class Solution {

    /**
     * 最长递增子序列
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        $n = count($nums);
        $dp = array_fill(0,$n,1);
        for($i=1;$i<$n;$i++) {
            for($j=0;$j<$i;$j++) {
                if($nums[$j]<$nums[$i])$dp[$i] = max($dp[$i],$dp[$j]+1);
            }
        }
        return max($dp);
    }
}

//在i的前面找严格小的j，有就+1