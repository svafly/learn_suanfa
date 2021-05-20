<?php
class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x<0 || $x-$this->isrev($x)!=0)return false;
        return true;
    }
    function isrev($x) {
        $tmp=0;
        while($x>=1){
            $tmp = $tmp*10 + $x%10;
            $x = floor($x/10);
        }
        return $tmp;
    }

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome2($x)
    {
        //转成字符串，用双指针
        $s = strval($x);
        $n = strlen($s);
        $i = 0;
        $j = $n-1;
        while ($i<$j) {
            if ($s[$i]!=$s[$j])return false;
            $i++;
            $j--;
        }
        return true;
    }
}
$solution = new Solution();
$n = 123;
print_r($solution->isPalindrome2($n));