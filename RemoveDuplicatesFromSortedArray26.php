<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        //php 自带函数
        $nums = array_unique($nums);
        print_r($nums);
        return count($nums);
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates2(&$nums) {
        $tmp = $nums[0];
        $length = count($nums);
        for ($i=1;$i<$length;$i++) {
            if ($nums[$i] == $tmp){
                unset($nums[$i]);
            } else {
                $tmp = $nums[$i];
            }
        }
        print_r($nums);
        return count($nums);
    }
}
$solution = new Solution();
$arr=[0,0,1,1,1,2,2,3,3,4];
print_r($solution->removeDuplicates2($arr));