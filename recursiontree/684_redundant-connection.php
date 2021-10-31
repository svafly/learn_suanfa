<?php
class Solution {
    private $n;
    private $to;
    private $visited;
    private $hasCycle;
    /**
     * 冗余连接
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges) {
        //取n节点
        foreach($edges as $edge){
            $x = $edge[0];
            $y = $edge[1];
            $this->n = max($this->n,max($x,$y));
        }
        //出边数组存图
        foreach($edges as $edge){
            $x = $edge[0];
            $y = $edge[1];
            $this->to[$x][] = $y;
            $this->to[$y][] = $x;
            $this->hasCycle=false;
            for($i=1;$i<=$this->n;$i++)$this->visited[$i] = false;
            $this->dfs($x,0);
            if($this->hasCycle)return $edge;
        }
        return [];
    }

    function dfs($x,$father){
        $this->visited[$x]=true;
        foreach($this->to[$x] as $y){
            if($y==$father)continue;
            if(!$this->visited[$y])$this->dfs($y,$x);
            else $this->hasCycle=true;
        }
    }
}