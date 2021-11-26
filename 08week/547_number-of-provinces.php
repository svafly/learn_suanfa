<?php
class Solution {

    private $fa;
    /**
     * 省份数量
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {
        $n = count($isConnected);
        //makeset
        for($i=0;$i<$n;$i++) {
            $this->fa[$i] = $i;
        }
        //合并
        for($i=0;$i<$n;$i++) {
            for($j=0;$j<$n;$j++){
                if($isConnected[$i][$j])$this->unionSet($i,$j);
            }
        }
        //有多少根既有多少省份
        $ans=0;

        for($i=0;$i<$n;$i++) {
            if($this->find($i) == $i)$ans++;
        }
        return $ans;
    }

    function find($x) {
        if ($x == $this->fa[$x])return $x;
        return $this->fa[$x] = $this->find($this->fa[$x]);
    }

    function unionSet($x,$y) {
        $x = $this->find($x);
        $y = $this->find($y);
        if($x!=$y)$this->fa[$x] = $y;
    }
}

//并查集，基本操作
//1.makeset，初始化每个集合是自己的根；2.合并；3.查找
//时间复杂度是近似O(α（n）<=5)