<?php
class Solution {

    /**
     * x的平方根
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        $left = 0;
        $right = $x;
        while($left<$right){
            $mid = ceil(($left+$right)/2);
            if($mid*$mid<=$x){
                $left = $mid;
            } else {
                $right = $mid-1;
            }
        }
        return $right;
    }

    function myRealSqrt($x){
        $left = 0;
        $right = $x;
        while($right-$left>le-7) {
            $mid = ($left+$right)/2;
            if($mid*mid<=$x){
                $left=$mid;
            } else {
                $right = $mid;
            }
        }
        return $right;
    }
}