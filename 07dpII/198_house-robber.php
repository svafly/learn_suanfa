<?php
class Solution {

    /**
     * 打家劫舍
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $n = count($nums);
        if ($n==0)return 0;
        $dp[0] = 0;
        $dp[1] = $nums[0];
        for ($i=1;$i<$n;$i++) {
            $dp[$i+1] = max($dp[$i],$dp[$i-1]+$nums[$i]);
        }
        return $dp[$n];
    }
}

//空间优化的话，可以直接用变量记录，数组都可以不用
//这里+$nums[$i],是nums是下标从0开始，dp从1开始