<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s) {
        return $this->check($s,0,strlen($s)-1,1);
    }

    function check($s,$l,$r,$times){
        while($l<$r) {
            if($s[$l]!=$s[$r]){
                return ($times>0 && ($this->check($s,$l+1,$r,0)||$this->check($s,$l,$r-1,0)));
            }
            $l++;
            $r--;
        }
        return true;
    }
}

//用递归，左移或右移一次