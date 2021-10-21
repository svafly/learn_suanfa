<?php
class Solution {
    private $res=[];

    /**
     * 全排列
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $this->traceBack($nums,[]);
        return $this->res;
    }

    function traceBack($nums,$chosen) {
        if (count($chosen) == count($nums)) {
            $this->res[] = $chosen;
        } else {
            for($i=0;$i<count($nums);$i++) {
                if(in_array($nums[$i],$chosen))continue;
                $chosen[] = $nums[$i];
                $this->traceBack($nums,$chosen);
                array_pop($chosen);
            }
        }
    }
}