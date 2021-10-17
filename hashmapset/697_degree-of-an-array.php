<?php
class Solution {

    /**
     * 数组的度
     * @param Integer[] $nums
     * @return Integer
     */
    function findShortestSubArray($nums) {
        $total = [];
        $first = [];
        $degree=0;
        $res=0;
        for ($i=0;$i<count($nums);$i++) {
            //如果不存在这个值，就插入第一次出现的值，key为数值，value存下标
            if (!array_key_exists($nums[$i],$first))$first[$nums[$i]] = $i;
            //总数+1
            $total[$nums[$i]] = array_key_exists($nums[$i],$total) ? $total[$nums[$i]]+1 : 1;
            //总数和degree比较，取总数大且长度小的
            if ($total[$nums[$i]] > $degree) {
                $degree = $total[$nums[$i]];
                $res = $i - $first[$nums[$i]] +1;
            } elseif($total[$nums[$i]] == $degree) {
                $res = min($res,$i - $first[$nums[$i]] +1);
            }
        }
        return $res;
    }
}
$solution = new Solution();
$book = [1, 2, 2, 3, 1];
print_r($solution->findShortestSubArray($book));