<?php
class climbStairs {
    /**
     * 爬楼梯
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

//这里用递归，分解成两个子问题，爬一级和爬2级的情况，用map来存储已经求解过的楼梯级数，避免重复计算