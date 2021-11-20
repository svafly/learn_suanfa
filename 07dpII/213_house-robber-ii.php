<?php
class Solution {

    /**
     * 打家劫舍II，环形DP
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $n = count($nums);
        if($n<2)return $n==0 ? 0 : $nums[0];
        $dp = array_fill(0,$n+1,array_fill(0,2,-1e9));
        //第一间不偷
        $dp[1][0]=0;
        for($i=2;$i<=$n;$i++) {
            for($j=0;$j<2;$j++) {
                $dp[$i][0] = max($dp[$i-1][0],$dp[$i-1][1]);
                $dp[$i][1] = $dp[$i-1][0]+$nums[$i-1];
            }
        }
        $ans = max($dp[$n][0],$dp[$n][1]);

        //第一间偷
        $dp[1][1]=$nums[0];
        for($i=2;$i<=$n;$i++) {
            for($j=0;$j<2;$j++) {
                $dp[$i][0] = max($dp[$i-1][0],$dp[$i-1][1]);
                $dp[$i][1] = $dp[$i-1][0]+$nums[$i-1];
            }
        }

        $ans = max($ans,$dp[$n][0]);
        return $ans;
    }
}