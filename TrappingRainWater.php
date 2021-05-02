<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap2($height) {
        $sum=0;
        $height_max = max($height);
        for($i=1;$i<=$height_max;$i++){
            $tmp_sum=0;
            $isStart=false;
            for($j=0;$j<count($height);$j++){
                if($height[$j]>=$i){
                    $sum = $sum+$tmp_sum;
                    $tmp_sum=0;
                    $isStart=true;
                }
                if($isStart && $height[$j]<$i){
                    $tmp_sum++;
                }
            }
        }
        return $sum;
    }
//  超出时间限制，时间复杂度为O(m*n)

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $sum = 0;
        $stack = new \SplStack();
        $current = 0;
        while($current<count($height)) {
            while (!$stack->isEmpty() && $height[$stack->top()]<$height[$current]) {
                $h = $height[$stack->top()];
                $stack->pop();
                if($stack->isEmpty()) {
                    break;
                }
                $distance = $current-$stack->top()-1;
                $min = min($height[$current],$height[$stack->top()]);
                $sum = $sum+$distance*($min-$h);
            }
            $stack->push($current);
            $current++;
        }
        return $sum;
    }
    //单调栈，时间复杂度O(n)
}