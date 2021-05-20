<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        //下标为0
        $row = [];
        $col = [];
        for ($i=0;$i<count($matrix);$i++) {
            for ($j=0;$j<count($matrix[$i]);$j++){
                if ($matrix[$i][$j] == 0){
                    $row[$i] = true;
                    $col[$j] = true;
                }
            }
        }
        for ($i=0;$i<count($matrix);$i++) {
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                if (isset($row[$i]) || isset($col[$j]))$matrix[$i][$j]=0;
            }
        }
        print_r($matrix);
    }
}
$solution = new Solution();
$arr = [[1,1,1],[1,0,1],[1,1,1]];
$solution->setZeroes($arr);
//零矩阵