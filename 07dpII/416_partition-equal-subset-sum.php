<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums):bool{
        $n = count($nums);
        $sum = 0;
        for ($i=0;$i<$n;$i++) {
            $sum += $nums[$i];
        }
        if($sum % 2 == 1)return false;
        array_unshift($nums,0);
        $v = $sum / 2;
        $dp = array_fill(0,$v+1,false);
        $dp[0] = true;
        for ($i=1;$i<=$n;$i++) {
            for ($j=$v;$j>=$nums[$i];$j--) {
                $dp[$j] |= $dp[$j-$nums[$i]];
                echo "this is ".$i." time";
            }
            print_r($dp);
        }
        return $dp[$v];
    }
}
$solution = new Solution();
$num = [1,5,11,5];
print_r($solution->canPartition($num));