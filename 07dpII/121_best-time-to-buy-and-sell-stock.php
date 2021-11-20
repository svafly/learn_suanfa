<?php
class Solution {

    /**
     * 买卖股票的最佳时机
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $max=0;
        $min = PHP_INT_MAX;
        for ($i=0;$i<count($prices);$i++) {
            if ($prices[$i]<$min)$min = $prices[$i];
            elseif($prices[$i]>$min)$max = max($prices[$i]-$min,$max);
        }
        return $max;
    }
}

//