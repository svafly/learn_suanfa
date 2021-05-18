<?php
class Solution
{

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString2(&$s)
    {
        $s = array_reverse($s);
        return $s;
    }

    function reverseString(&$s)
    {
        if (count($s)<2)return $s;
        $i = 0;
        $j = count($s)-1;
        while ($i<$j) {
            list($s[$i],$s[$j]) = [$s[$j],$s[$i]];
//            $tmp = $s[$i];
//            $s[$i] = $s[$j];
//            $s[$j] = $tmp;
            $i++;
            $j--;
        }
        return $s;
    }
}
$solution = new Solution();
$s=["h","e","l","l","o"];
print_r($solution->reverseString($s));