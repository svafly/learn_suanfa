<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        //判断二维矩阵
        //从右上角开始寻找
        if ($matrix==null || count($matrix)==0 || count($matrix[0])==0)return false;
        $colMax = count($matrix[0])-1;
        $row = 0;
        while ($colMax>=0 && $row<count($matrix)) {
            if ($target == $matrix[$row][$colMax]){
                return true;
            } elseif ($target > $matrix[$row][$colMax]) {
                $row++;
            } elseif ($target < $matrix[$row][$colMax]) {
                $colMax--;
            }
        }
        return false;
    }
}
$solution = new Solution();
$matrix = [[1,1]];
$target = 0;
print_r($solution->searchMatrix($matrix, $target));