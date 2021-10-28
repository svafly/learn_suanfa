<?php
class Solution {

    private $ans=[];
    private $p=[];
    private $used=[];
    private $usedPlus=[];
    private $usedMinus=[];
    /**
     * N皇后问题
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $this->dfs(0,$n);
        $result=[];
        foreach($this->ans as $an){
            $res=[];
            for($i=0;$i<$n;$i++) {
                $temp = array_fill(0,$n,".");
                $temp[$an[$i]]="Q";
                $res[] = implode($temp);
            }
            $result[] = $res;
        }
        return $result;
    }

    function dfs($row,$n) {
        if($row==$n){
            $this->ans[] = $this->p;
            return;
        }
        for($col=0;$col<$n;$col++){
            if((array_key_exists($col,$this->used) && $this->used[$col]) ||
                (array_key_exists($row-$col,$this->usedMinus) && $this->usedMinus[$row-$col]) ||
                (array_key_exists($row+$col,$this->usedPlus) && $this->usedPlus[$row+$col]))continue;
            $this->p[]  = $col;
            $this->used[$col] = true;
            $this->usedMinus[$row-$col]=true;
            $this->usedPlus[$row+$col]=true;
            $this->dfs($row+1,$n);

            $this->used[$col] = false;
            $this->usedMinus[$row-$col]=false;
            $this->usedPlus[$row+$col]=false;
            array_pop($this->p);
        }
    }
}