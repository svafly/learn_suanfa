<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $k=2;
        $n = count($prices);
        if($n<2)return 0;
        //动归从1开始下标
        array_unshift($prices,0);
        $f = array_fill(0,$n,array_fill(0,2,array_fill(0,$k,PHP_INT_MIN)));
        $f[0][0][0] = 0;
        for ($i=1;$i<=$n;$i++){

            for($j=0;$j<2;$j++){
                for($c=0;$c<=$k;$c++) {
                    if($c>0)$f[$i][0][$c] = max($f[$i-1][1][$c-1]+$prices[$i],$f[$i][0][$c]);
                    $f[$i][1][$c] = max($f[$i-1][0][$c]-$prices[$i],$f[$i][1][$c]);
                    $f[$i][$j][$c] = max($f[$i][$j][$c],$f[$i-1][$j][$c]);
                }

            }
        }
        $ans = 0;
        for($c=0;$c<=$k;$c++) {
            $ans = max($ans,$f[$n][0][$c]);
        }
        return $ans;
    }
}

//根据第四题，把k设置为2即可