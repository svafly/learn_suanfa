<?php
class Solution {

    /**
     * 跳跃游戏
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump2($nums) {
        $k=0;
        for($i=0;$i<count($nums);$i++){
            if($i>$k)return false;
            $k = max($k,$nums[$i]+$i);
        }
        return true;
    }

    //动归，第i个能跳的最大值为i-1能跳的最大值-1和当前i的数的max
    function canJump($nums) {
        $n = count($nums);
        $dp[0] = $nums[0];
        for ($i=1;$i<$n;$i++) {
            if($dp[$i-1] == 0)return false;
            $dp[$i] = max($dp[$i-1]-1,$nums[$i]);
        }
        return true;
    }
}