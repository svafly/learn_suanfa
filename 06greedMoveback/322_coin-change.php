<?php
class Solution {

    /**
     * 零钱兑换
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) {
        $dp = array_fill(0,$amount+1,$amount+1);
        $dp[0]=0;
        for($i=1;$i<=$amount;$i++) {
            for($j=0;$j<count($coins);$j++) {
                if($coins[$j]<=$i){
                    $dp[$i] = min($dp[$i],$dp[$i-$coins[$j]]+1);
                }
            }
        }
        return $dp[$amount]>$amount ? -1 : $dp[$amount];
    }
}