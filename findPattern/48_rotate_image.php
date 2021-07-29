<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        //是否n*n维矩阵
        $l1=count($matrix);
        if ($l1 == 0 || count($matrix[0]) != $l1) return;
        //反转
        $start = 0;
        $end = $l1-1;
        while($start<$end){
            $temp = $matrix[$start];
            $matrix[$start] = $matrix[$end];
            $matrix[$end] = $temp;
            $start++;
            $end--;
        }
        print_r($matrix);
        //交换
        for ($i=0;$i<$l1;$i++) {
            for ($j=$i+1;$j<$l1;$j++) {
                $temp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $temp;
            }
        }
        return $matrix;
    }
}
$solution = new Solution();
//$nums = [[1,2],[3,4]];
$nums = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]];
//[[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]
print_r($solution->rotate($nums));