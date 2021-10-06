<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne(array $digits):array {
        $len = count($digits);
        for($i=$len-1;$i>=0;$i--){
            if($digits[$i]<9){
                $digits[$i]++;
                return $digits;
            }
            $digits[$i]=0;
        }
//        print_r($digits);
        array_unshift($digits,1);
//        print_r($digits);exit;
        return $digits;
    }
}
$solution = new Solution();
$ar = [9];
print_r($solution->plusOne($ar));
//这里有个9的情况，要进1，php特殊的是数组不需要定长，用自带函数插入即可，其他语言需要新增一个位置
//int[] newNumber = new int [len+1];
// newNumber[0] = 1;