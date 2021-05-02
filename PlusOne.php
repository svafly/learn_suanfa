<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $len = count($digits);
        for($i=$len-1;$i>=0;$i--){
            if($digits[$i]<9){
                $digits[$i]++;
                return $digits;
            }
            $digits[$i]=0;
        }
        print_r($digits);
        array_unshift($digits,1);
        print_r($digits);exit;
        return $digits;
    }
}
$solution = new Solution();
$ar = [9];
print_r($solution->plusOne($ar));