<?php
class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) {
        if (count($matrix) <=0 || count($matrix[0]) <= 0) {
            return 0;
        }
        $col = count($matrix[0]) + 1;
        $row = count($matrix);
        $height = array_fill(0,$col,0);
        $ret=0;

        for ($i=0;$i<$row;$i++) {
            $s = new \SplStack();
            for ($j=0;$j<$col;$j++) {
                if ($j < $col-1) {
                    if ($matrix[$i][$j] == 1) $height[$j] +=1;
                    else $height[$j]  = 0;
                }
                print_r($height);
                echo "\n";
                print_r($s);
                echo "第".$i."行";
                echo "第".$j."列";
                echo "\n";
                while (!$s->isEmpty() && $height[$s->top()]>=$height[$j]) {
                    $h = $height[$s->top()];
                    $s->pop();
                    $w = $s->isEmpty() ? $j : $j-$s->top()-1;
                    if ($w * $h > $ret) $ret = $w * $h;
                }
                echo "面积：";
                print_r($ret);
                echo "\n";
                echo "\n";
                $s->push($j);
            }
        }
        return $ret;
    }
}

$solution = new Solution();
$matrix = [["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]];
var_dump($solution->maximalRectangle($matrix));

//从上到下遍历，和接雨水很像，设计一个列+1的高度，右移遇到比自己矮的则出栈