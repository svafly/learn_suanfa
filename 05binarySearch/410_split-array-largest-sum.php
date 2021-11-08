<?php
class Solution {

    /**
     * 分割数组的最大值
     * @param Integer[] $nums
     * @param Integer $m
     * @return Integer
     */
    function splitArray($nums, $m) {
        $left=0;
        $right=0;
        foreach($nums as $num){
            $right += $num;
            $left = max($left,$num);
        }
        while($left<$right){
            $mid = floor(($left+$right)/2);
            if($this->validate($nums,$m,$mid)){
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return $right;
    }

    function validate($nums,$m,$size){
        $box=0;
        $count=1;
        foreach($nums as $num) {
            if($box+$num<=$size){
                $box += $num;
            } else {
                $box=$num;
                $count++;
            }
        }
        return $count <= $m;
    }
}
//二分答案，需要一个判定函数，然后把问题转化成单调性查目标值