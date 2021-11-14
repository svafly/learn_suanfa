<?php
class Solution {

    /**
     * 跳跃游戏II
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        $now = 0;
        $ans = 0;
        while ($now < count($nums)-1) {
            $right = $now + $nums[$now];
            if ($right >= count($nums)-1)return $ans+1;
            $nextRight = $right;
            $next = $now;
            for($i = $now+1;$i<=$right;$i++){
                if($i+$nums[$i]>$nextRight){
                    $nextRight = $i+$nums[$i];
                    $next = $i;
                }
            }
            $now = $next;
            $ans++;
        }
        return $ans;
    }
}