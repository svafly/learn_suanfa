<?php
class Solution {

    /**
     * 最大子序和
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $n = count($nums);
        $s[0] = 0;
        $ans=PHP_INT_MIN;
        for ($i=1;$i<=$n;$i++)$s[$i] = $s[$i-1]+$nums[$i-1];
        $premin[0]=$s[0];
        for ($i=1;$i<=$n;$i++) {
            $premin[$i] = min($premin[$i-1],$s[$i]);
            $ans = max($s[$i]-$premin[$i-1],$ans);
        }
        return $ans;
    }
}
$solution = new Solution();
$nums = [-2,1,-3,4,-1,2,1,-5,4];
print_r($solution->maxSubArray($nums));