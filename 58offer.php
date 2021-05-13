<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $map = explode(' ',trim($s));
        $i=0;
        $j=count($map)-1;
        $tmp = [];
        for ($i = count($map)-1;$i>=0;$i--) {
            if ($map[$i]!=null)
                $tmp[] = $map[$i];
        }
        return implode(" ",$tmp);
    }
}

$solution = new Solution();
$str = "  hello   world!  ";
print_r($solution->reverseWords($str));