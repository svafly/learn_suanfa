<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $k=0;
        for($i=0;$i<count($nums);$i++){
            if($i>$k)return false;
            $k = max($k,$nums[$i]+$i);
        }
        return true;
    }
}
//最远的能到达，则最远之前的都能到达
$solution = new Solution();
$nums = [2,3,1,1,4];
print_r($solution->canJump($nums));