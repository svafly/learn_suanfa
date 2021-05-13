<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if ($x<0)return false;
        $cur=0;
        $num = $x;
        while($num>=1) {
            $cur = $cur * 10 + $num % 10;
            $num /= 10;
        }
        return $cur == $x;
    }
}

$solution = new Solution();
$x = 121;
print_r($solution->isPalindrome($x));