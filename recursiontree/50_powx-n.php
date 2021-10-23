<?php
class Solution {

    /**
     * pow(x,n)
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n == 0)return 1;
        if ($n<0){
            $n = -$n;
            $x = 1/$x;
        }
        return ($n%2==0) ? $this->myPow($x*$x,$n/2) : $this->myPow($x*$x,$n/2)*$x;
    }
}
//分治的思想，每一次分一半
$solution = new Solution();
$x=0.999999999;$n=-2147483648;
print_r($solution->myPow($x,$n));