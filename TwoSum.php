<?php
class TwoSum {
    //暴力解法
    function twoSum($nums, $target) {
        for ($i=0;$i<count($nums)-1;$i++) {
            for ($j=$i+1;$j<count($nums);$j++) {
                if (($nums[$i] + $nums[$j]) == $target) {
                    return [$i,$j];
                }
            }
        }
    }

    function twoSum2($nums, $target) {
        //in_array是循环遍历，时间复杂度较高
        //isset和array_key_exists是hash，时间复杂度较低;isset如果值为null，则返回false，array_key_exists返回true
        $map=[];
        for ($i=0;$i<count($nums);$i++) {
            $targetNum = $target-$nums[$i];
            if (array_key_exists($targetNum, $map)) {
                return [$i,$map[$targetNum]];
            }
            $map[$nums[$i]] = $i;
        }
    }
}
$solution = new TwoSum();
print_r($solution->twoSum2([2,7,11,15],9));
