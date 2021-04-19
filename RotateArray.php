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
        return array_merge(array_splice($nums,$length-$offset),$nums);
    }

    function rotate2(&$nums,int $k):array {
        $length = count($nums);
        if ($length==0 || $length==$k)return $nums;
        $k = $k%$length;

        $nums = array_reverse($nums);
        $this->reverse($nums,0,$k-1);
        $this->reverse($nums,$k,$length-1);
        return $nums;
    }

    public function reverse(&$nums,$start,$end) {
        while($start<$end) {
            $tmp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $tmp;
            $start++;
            $end--;
        }
    }
}

$solution = new Solution();
$arr = [1,2,3,4,5,6,7];
$k = 3;
print_r($solution->rotate($arr,$k));