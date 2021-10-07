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

    function removeDuplicates3(&$nums) {
        if ($nums==null || count($nums)==0)return 0;
        $q=1;
        for($i=1;$i<count($nums);$i++) {
            if($nums[$i]!=$nums[$i-1])$nums[$q++]=$nums[$i];
        }
        return $q;
    }

    function removeDuplicates4(&$nums) {
        if ($nums==null || count($nums)==0)return 0;
        $p=0;
        $q=1;
        while ($q<count($nums)) {
            if ($nums[$p] != $nums[$q]){
                $nums[$p+1] = $nums[$q];
                $p++;
            }
            $q++;
        }
        return $p+1;
    }
}
$solution = new Solution();
$arr=[0,0,1,1,1,2,2,3,3,4];
print_r($solution->removeDuplicates3($arr));