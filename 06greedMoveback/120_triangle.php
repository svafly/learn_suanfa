<?php
class Solution {

    /**
     * 三角形最小路径和
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal2($triangle) {
        $n = count($triangle);
        $dp[$n-1]=$triangle[$n-1];
        for($i=$n-2;$i>=0;$i--) {
            for($j=0;$j<=$i;$j++){
                $dp[$i][$j] = min($dp[$i+1][$j],$dp[$i+1][$j+1])+$triangle[$i][$j];
            }
        }
        // print_r($dp);
        return $dp[0][0];
    }

    function minimumTotal($triangle) {
        $n = count($triangle);
        $dp=$triangle[$n-1];
        for($i=$n-2;$i>=0;$i--) {
            for($j=0;$j<=$i;$j++){
                $dp[$j] = min($dp[$j],$dp[$j+1])+$triangle[$i][$j];
            }
        }
        // print_r($dp);
        return $dp[0];
    }
}

//从n-2层开始，自底向上，初始化底边的和是已知的，我没想到从底往上，也没想到要从n-2开始。。。。。
//空间优化，上一层算完就不需要了，不需要记录层数，因为是累加和