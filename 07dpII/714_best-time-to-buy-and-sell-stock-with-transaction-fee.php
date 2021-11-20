<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @param Integer $fee
     * @return Integer
     */
    function maxProfit($prices, $fee) {
        $n = count($prices);
        //动归从1开始下标
        array_unshift($prices,0);
        $f = array_fill(0,$n,array_fill(0,2,PHP_INT_MIN));
        $f[0][0] = 0;
        for ($i=1;$i<=$n;$i++){
            $f[$i][0] = max($f[$i-1][1]+$prices[$i],$f[$i][0]);
            $f[$i][1] = max($f[$i-1][0]-$prices[$i]-$fee,$f[$i][1]);
            for($j=0;$j<2;$j++){
                $f[$i][$j] = max($f[$i][$j],$f[$i-1][$j]);
            }
        }
        return $f[$n][0];
    }
}

//每次交易的时候扣除手续费即可