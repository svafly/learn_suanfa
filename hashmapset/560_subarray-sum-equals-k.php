<?php
class Solution {

    /**
     * 和为 K 的子数组
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k) {
        $res = 0;
        $sum = 0;
        //key表示前缀和，value是前缀和的个数
        $preSumC[0] = 1;
        foreach ($nums as $num) {
            $sum += $num;
            //这里和两数和的思想一样，a+b=target,则a=target-b
            if (array_key_exists($sum-$k,$preSumC)) {
                $res += $preSumC[$sum-$k];
            }
            $preSumC[$sum]  = array_key_exists($sum,$preSumC) ? $preSumC[$sum]+1 : 1;
        }
        return $res;
    }
}


$solution = new Solution();
$book = [1, 1, 1];
$k = 2;
print_r($solution->subarraySum($book,$k));