<?php
class Solution {

    private $n=0;
    private $to;
    /**
     * 树的直径
     * @param $edges
     * @return int
     */
    function treeDiameter(&$edges) {
        foreach ($edges as $edge) {
            $x = $edge[0];
            $y = $edge[1];
            $this->n = max($this->n,max($x,$y));
        }
        //最大点+1
        $this->n++;
        //出边数组
        $this->to = [];
        foreach ($edges as $edge) {
            $x = $edge[0];
            $y = $edge[1];
            $this->to[$x][] = $y;
            $this->to[$y][] = $x;
        }
        $p = $this->findFarthest(0)[0];
        print_r($p);
        return $this->findFarthest($p)[1];
    }

    function findFarthest($start) {
        //初始层数
        $depth = array_fill(0,$this->n+1,-1);
        $q = new SplQueue();
        $q->enqueue($start);
        $depth[$start]=0;
        while(!$q->isEmpty()){
            $x = $q->bottom();
            $q->dequeue();
            foreach ($this->to[$x] as $y) {
                if ($depth[$y] != -1)continue;
                $depth[$y] = $depth[$x]+1;
                $q->enqueue($y);
            }
        }
        print_r($depth);
        $ans = $start;
        for($i=0;$i<$this->n;$i++){
            if ($depth[$i]>$depth[$ans])$ans=$i;
        }
        return [$ans,$depth[$ans]];
    }
}
//用BFS来搜索遍历
$solution = new Solution();
$edges=[[0,1],[1,2],[2,3],[1,4],[4,5]];
print_r($solution->treeDiameter($edges));