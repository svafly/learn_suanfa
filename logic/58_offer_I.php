<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $tmp = explode(" ",trim($s));
        print_r($tmp);
        $map = [];
        for($i=count($tmp)-1;$i>=0;$i--){
            if ($tmp[$i]!=null)
                $map[] = $tmp[$i];
        }
        return implode(" ",$map);
    }
}
$solution = new Solution();
$n = "a good   example";
print_r($solution->reverseWords($n));