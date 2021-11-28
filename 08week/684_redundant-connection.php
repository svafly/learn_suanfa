<?php
class Solution {

    private $fa;
    /**
     * 冗余连接
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges) {
        $n = count($edges);
        for($i=1;$i<=$n;$i++)$this->fa[$i] = $i;
        foreach($edges as $edge) {
            $x = $edge[0];
            $y = $edge[1];
            if($this->find($x) == $this->find($y))return $edge;
            else {
                $this->unionSet($x,$y);
            }
        }
        return [0,0];
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
}

//并查集，每个数组看做单独的集合，如果不相等就合并，然后找到代表父节点一样的，则说明这个边是重复的
//[[1,2], [1,3], [2,3]],1-2合并，1-3合并，2的代表和3的代表一样，则输出