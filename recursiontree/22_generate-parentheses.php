<?php
class Solution {

    private $list = [];
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->backTrack("",0,0,$n);
        return $this->list;
    }

    function backTrack($str,$open,$close,$max) {
        if (strlen($str) == $max*2) {
            $this->list[] = $str;
            return;
        }
        if ($open<$max)$this->backTrack($str."(",$open+1,$close,$max);
        if ($close<$open)$this->backTrack($str.")",$open,$close+1,$max);
    }
}