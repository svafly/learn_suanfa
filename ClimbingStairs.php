<?php
class climbStairs {
    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        //斐波那契数列
        $dp = [1=>1,2=>2];
        for($i=3;$i<=$n;$i++) {
            $dp[$i] = $dp[$i-1]+$dp[$i-2];
        }
        return $dp[$n];
    }
}
$solution = new climbStairs();
print_r($solution->climbStairs(5));