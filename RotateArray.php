<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, int $k):array {
        $length = count($nums);
        if ($length==0 || $length==$k)return $nums;
        $offset = $k%$length;

        return array_merge(array_splice($nums,$offset),$nums);
    }
}

$solution = new Solution();
$arr = [-1,-100,3,99];
$k = 2;
print_r($solution->rotate($arr,$k));