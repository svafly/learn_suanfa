<?php
class Solution {

    /**
     * 最长回文子串
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        //找中心点，往两边扩展
        $n = strlen($s);
        $ansLen = 0;
        $ansStart = 0;
        //奇回文串
        for($i=0;$i<$n;$i++) {
            $l = $i-1;
            $r = $i+1;
            while($l>=0 && $r<$n && $s[$l]==$s[$r]){
                $l--;
                $r++;
            }
            if($r-$l-1>$ansLen){
                $ansLen = $r-$l-1;
                $ansStart = $l+1;
            }
        }
        //偶回文串
        for($i=1;$i<$n;$i++) {
            $l = $i-1;
            $r = $i;
            while($l>=0 && $r<$n && $s[$l]==$s[$r]){
                $l--;
                $r++;
            }
            if($r-$l-1>$ansLen){
                $ansLen = $r-$l-1;
                $ansStart = $l+1;
            }
        }

        return substr($s,$ansStart,$ansLen);
    }
}