<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Integer
     */
    function numSubmatrixSumTarget($matrix, $target) {
        $row = count($matrix);
        $col = count($matrix[0]);
        $sum=[];
        $ans = 0;
        //先对每行做前缀和预处理
        for ($i=0;$i<$row;$i++) {
            for ($j=1;$j<$col;$j++) {
                $matrix[$i][$j] += $matrix[$i][$j-1];
            }
        }
        for ($k=0;$k<$col;$k++) {
            for ($j=$k;$j<$col;$j++) {
                $sum = 0;
                $mp = [];
                $mp[0] = 1;
                for ($i=0;$i<$row;$i++) {
                    $sum += ($k==0 ? $matrix[$i][$j] : $matrix[$i][$j]-$matrix[$i][$k-1]);
                    if (array_key_exists($sum-$target,$mp))$ans += $mp[$sum-$target];
                    if (array_key_exists($sum,$mp))$mp[$sum]++;
                    else $mp[$sum]  = 1;
                }
                print_r($mp);
            }
        }
        return $ans;
    }
}

$matrix = [[0,1,0],[1,1,1],[0,1,0]];
$solution = new Solution();
print_r($solution->numSubmatrixSumTarget($matrix,0));

