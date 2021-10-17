<?php
class Solution {

    /**
     * 两数之和 II - 输入有序数组
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $j = count($numbers)-1;
        $i = 0;
        while ($i<$j) {
            if ($numbers[$i] + $numbers[$j] == $target)return [$i+1,$j+1];
            $numbers[$i] + $numbers[$j] <$target ? $i++ : $j--;
        }
        return [];
    }
}
//双指针，需要排序
$solution = new Solution();
$book = [2,7,11,15];
$n = 9;
print_r($solution->twoSum($book,$n));