<?php
class Solution {

    private $fa;
    private $total;
    /**
     * 被围绕的区域
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        $m = count($board);
        $n = count($board[0]);
        $this->total = $n;
        $dx = [-1,0,0,1];
        $dy = [0,-1,1,0];
        //MakeSet
        for($i=0;$i<=$n*$m;$i++)$this->fa[$i] = $i;
        //定义一个外部点
        $outSide = $m*$n;
        for ($i=0;$i<$m;$i++) {
            for ($j=0;$j<$n;$j++) {
                if ($board[$i][$j] == "X")continue;
                for ($k=0;$k<4;$k++) {
                    $nx = $i+$dx[$k];
                    $ny = $j+$dy[$k];
                    if($nx<0 || $ny<0 || $nx >= $m || $ny>=$n){
                        $this->unionSet($this->num($i,$j),$outSide);
                    }
                    else {
                        if($board[$nx][$ny] == "O"){
                            $this->unionSet($this->num($i,$j),$this->num($nx,$ny));
                        }
                    }
                }
            }
        }
        $outSide = $this->find($outSide);

        for ($i=0;$i<$m;$i++) {
            for ($j=0;$j<$n;$j++) {
                if($board[$i][$j]=="O" && $this->find($this->num($i,$j))!=$outSide){
                    $board[$i][$j] = "X";
                }
            }
        }
        return $board;
    }

    function find($x) {
        if($x == $this->fa[$x])return $x;
        return $this->fa[$x] = $this->find($this->fa[$x]);
    }

    function unionSet($x,$y) {
        $x = $this->find($x);
        $y = $this->find($y);
        if ($x!=$y)$this->fa[$x] = $y;
    }

    function num($i,$j) {
        return $this->total*$i + $j;
    }
}

//并查集
//矩阵外找一个点，跟这个点合并，最后看哪个father不是outside，则改成X