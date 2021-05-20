<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $n
     * @return String
     */
    function reverseLeftWords($s, $k):string {
        $n = strlen($s);
        if($n<=1)return $s;
//        $s .= $s;
//        return substr($s,$k,$n);
        return substr($s,$k).substr($s,0,$k);
    }
}
//1.利用切片
$solution = new Solution();
$n = "abcdefg";
print_r($solution->reverseLeftWords($n,2));