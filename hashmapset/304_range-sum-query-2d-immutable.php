<?php
class NumMatrix {

    private $S;
    /**
     * 二维区域和检索 - 矩阵不可变
     * @param Integer[][] $matrix
     */
    function __construct($matrix) {
        $row = count($matrix);
        $col = count($matrix[0]);
        $this->S=[];
        for ($i=1;$i<=$row;$i++) {
            for ($j=1;$j<=$col;$j++) {
                $this->S[$i][$j] = $this->S[$i-1][$j] + $this->S[$i][$j-1] - $this->S[$i-1][$j-1] + $matrix[$i-1][$j-1];
            }
        }
    }

    /**
     * @param Integer $row1
     * @param Integer $col1
     * @param Integer $row2
     * @param Integer $col2
     * @return Integer
     */
    function sumRegion($row1, $col1, $row2, $col2) {
        $row1++;$row2++;$col1++;$col2++;
        return $this->S[$row2][$col2] - $this->S[$row2][$col1-1]-$this->S[$row1-1][$col2]+$this->S[$row1-1][$col1-1];
    }
}
//二维前缀和
//二维数组A
//前缀和数组S[i][j] = S[i-1][j]+S[i][j-1]-S[i-1][j-1]+A[i][j];
//子矩阵和——以（p,q)为左上角、(i,j)为右下角的A的子矩阵中数的和：
//sum(p,q,i,j) = S[i][j] - S[i][q-1]-S[p-1][j]+S[p-1][q-1]

$matrix = [[[3,0,1,4,2],[5,6,3,2,1],[1,2,0,1,5],[4,1,0,1,7],[1,0,3,0,5]]];
$solution = new NumMatrix($matrix);
print_r($solution->sumRegion(2,1,4,3));
/**
 * Your NumMatrix object will be instantiated and called as such:
 * $obj = NumMatrix($matrix);
 * $ret_1 = $obj->sumRegion($row1, $col1, $row2, $col2);
 */