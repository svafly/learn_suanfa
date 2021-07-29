<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        //界定边界
        //逐一取值，直到到达边界
        $res = [];
        if (count($matrix) == 0)return $res;
        $rowBegin = 0;
        $rowEnd = count($matrix) - 1;
        $colBegin = 0;
        $colEnd = count($matrix[0]) - 1;
        while ($rowBegin <= $rowEnd && $colBegin <= $colEnd) {
            for ($i=$colBegin;$i<=$colEnd;$i++){
                $res[]=$matrix[$rowBegin][$i];
            }
            $rowBegin++;

            for ($i=$rowBegin;$i<=$rowEnd;$i++){
                $res[]=$matrix[$i][$colEnd];
            }
            $colEnd--;

            if ($rowBegin<=$rowEnd) {
                for ($i=$colEnd;$i>=$colBegin;$i--){
                    $res[]=$matrix[$rowEnd][$i];
                }
            }
            $rowEnd--;

            if ($colBegin<=$colEnd) {
                for ($i=$rowEnd;$i>=$rowBegin;$i--){
                    $res[]=$matrix[$i][$colBegin];
                }
            }
            $colBegin++;
        }
        return $res;
    }
}
$solution = new Solution();
$matrix = [[1,2,3,4],[5,6,7,8],[9,10,11,12]];
print_r($solution->spiralOrder($matrix));