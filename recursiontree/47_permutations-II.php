<?php
class Solution {
    private $res=[];

    /**
     * 全排列II
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        sort($nums);
        $used=array_fill(0,count($nums),false);
        $this->traceBack($nums,[],$used);
        print_r($this->res);
        return $this->res;
    }

    function traceBack($nums,$chosen,$used) {
        if (count($chosen) == count($nums)) {
            $this->res[] = $chosen;
        } else {
            for($i=0;$i<count($nums);$i++) {
                if($used[$i] || $i>0 && $nums[$i] == $nums[$i-1] && !$used[$i-1])continue;
                $chosen[] = $nums[$i];
                $used[$i] = true;
                $this->traceBack($nums,$chosen,$used);
                $used[$i] = false;
                array_pop($chosen);
            }
        }
    }
}

$solution = new Solution();
$nums = [1,1,2];
$solution->permuteUnique($nums);