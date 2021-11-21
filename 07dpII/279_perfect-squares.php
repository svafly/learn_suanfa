<?php
class Solution {

    /**
     * 完全平方数
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n) {
        $f = array_fill(0,$n+1,1e9);
        $f[0] = 0;
        for($t=1;$t*$t<=$n;$t++) {
            $x = $t*$t;
            for($j=$x;$j<=$n;$j++){
                $f[$j] = min($f[$j],$f[$j-$x]+1);
            }
        }
        return $f[$n];
    }
}