<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isStraight($nums) {
        //数组合理性
        if ($nums==null || count($nums)<5)return false;

        sort($nums);
        $joker = 0;
        for ($i=0;$i<4;$i++) {
            if ($nums[$i] == 0) {
                $joker++;
            } elseif ($nums[$i]==$nums[$i+1]) {
                return false;
            }
        }
        return ($nums[4]-$nums[$joker]) < 5;
    }
}
$solution = new Solution();
$nums = [0,0,1,2,5];
print_r($solution->isStraight($nums));