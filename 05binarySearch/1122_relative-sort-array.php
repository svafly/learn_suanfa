<?php
class Solution {

    private $sortArr = [];
    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        $this->sortArr = $arr2;
//        for ($i=0;$i<count($arr2);$i++){
//            $sortArr[$arr2[$i]] = $i;
//        }
        uasort($arr1,function ($x,$y) {
            $tempX = array_keys($this->sortArr,$x);
            $tempY = array_keys($this->sortArr,$y);
            $posX = count($tempX) > 0 ? $tempX[0] : count($this->sortArr);
            $posY = count($tempY) > 0 ? $tempY[0] : count($this->sortArr);
            echo $posX."-".$posY;
            echo "\n";
            return $posX>$posY || ($posX == $posY && $x>$y);
        });
        print_r($arr1);
        return $arr1;
    }
}
$solution = new Solution();
$arr1 = [26,21,11,20,50,34,1,18];
$arr2 = [21,11,26,20];
$solution->relativeSortArray($arr1,$arr2);