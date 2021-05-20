<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $s = trim($s);
        if ($s==null)return 0;
        $s_add = explode(" ",$s);
        return strlen($s_add[count($s_add)-1]);
    }

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord2($s) {
        $len=0;
        $tail = strlen($s)-1;
        while ($tail>=0 && $s[$tail]==' ')$tail--;
        while ($tail>=0 && $s[$tail]!=' ') {
            $len++;
            $tail--;
        }
        return $len;
    }
}
$solution = new Solution();
$n = "a good man ";
print_r($solution->lengthOfLastWord2($n));