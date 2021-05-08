<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $low=0;
        $high=count($nums)-1;
        while($low<=$high) {
            $mid = floor(($low+$high)/2);
            if($nums[$mid] == $target)return $mid;
            //先判断mid是在左还是右
            if ($nums[$mid]>=$nums[$low]) {
                if($target>=$nums[$low] && $target<$nums[$mid]){
                    $high = $mid-1;
                } else {
                    $low = $mid+1;
                }
            } else {
                if ($target>$nums[$mid] && $target<=$nums[$high]) {
                    $low = $mid+1;
                } else {
                    $high = $mid-1;
                }
            }

        }
        return -1;
    }
}

$solution = new Solution();
$testArr = [1,3];
$target = 1;
print_r($solution->search($testArr,$target));