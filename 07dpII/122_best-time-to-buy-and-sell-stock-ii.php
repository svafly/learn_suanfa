<?php
class Solution {

    /**
     * 买卖股票的最佳时机II
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $ans=0;
        for($i=1;$i<count($prices);$i++){
            $ans += max(0,$prices[$i]-$prices[$i-1]);
        }
        return $ans;
    }
//连续上涨交易日： 设此上涨交易日股票价格分别为 p_1, p_2, ... , p_n,则第一天买最后一天卖收益最大，即 p_n - p_1
//等价于每天都买卖，即 p_n - p_1=(p_2 - p_1)+(p_3 - p_2)+...+(p_n - p_{n-1})



    //通用解法
    function maxProfit2($prices) {
        $n = count($prices);
        //动归从1开始下标
        array_unshift($prices,0);
        $f = array_fill(0,$n,array_fill(0,2,PHP_INT_MIN));
        $f[0][0] = 0;
        for ($i=1;$i<=$n;$i++){
            $f[$i][0] = max($f[$i-1][1]+$prices[$i],$f[$i][0]);
            $f[$i][1] = max($f[$i-1][0]-$prices[$i],$f[$i][1]);
            for($j=0;$j<2;$j++){
                $f[$i][$j] = max($f[$i][$j],$f[$i-1][$j]);
            }
        }
        return $f[$n][0];
    }
}