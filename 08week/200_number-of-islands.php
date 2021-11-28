<?php
class Solution {

    private $fa;
    private $t;
    private $count=0;
    /**
     * 岛屿数量
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $m = count($grid);
        $n = count($grid[0]);
        $this->t = $n;
        $dx = [-1,0,0,1];
        $dy = [0,-1,1,0];
        $this->fa = array_fill(0,$m*$n,0);
        for($i=0;$i<$m;$i++) {
            for($j=0;$j<$n;$j++) {
                if($grid[$i][$j]=="1"){
                    $this->fa[$this->num($i,$j)] = $this->num($i,$j);
                    $this->count++;
                }
            }
        }

        for($i=0;$i<$m;$i++) {
            for($j=0;$j<$n;$j++) {
                if($grid[$i][$j] == "0")continue;
                for($k=0;$k<4;$k++) {
                    $nx = $i+$dx[$k];
                    $ny = $j+$dy[$k];
                    if($nx>=0 && $ny>=0 && $nx < $m && $ny<$n && $grid[$nx][$ny]=="1"){
                        $this->unionSet($this->num($i,$j),$this->num($nx,$ny));
                    }
                }
            }
        }

        $ans=0;
        for($i=0;$i<$n*$m;$i++) {
            if($this->find($i) == $i)$ans++;
        }
        return $this->count;
    }

    function find($x) {
        if ($x == $this->fa[$x]) return $x;
        return $this->fa[$x] = $this->find($this->fa[$x]);
    }

    function unionSet($x,$y) {
        $x = $this->find($x);
        $y = $this->find($y);
        // echo $x."-".$y.";";
        if ($x!=$y){
            $this->fa[$x] = $y;
            print_r($this->fa[$x]);
            $this->count--;
        }
    }

    function num($i,$j) {
        return $this->t*$i + $j;
    }
}
//初始化所有陆地都为一个单独集合，然后按照方向合并相邻陆地