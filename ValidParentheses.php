<?php
class Solution {
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s):bool {
        $eg = ["{"=>"}","["=>"]","("=>")"];
        $arr = [];
        for ($i=0;$i<strlen($s);$i++) {
            $tmp = end($arr);
            if ($tmp!=null && $eg["$tmp"] == $s[$i]) {
                unset($arr[key($arr)]);
            } else {
                $arr[] = $s[$i];
            }
        }
        return count($arr) == 0;
    }
}

$solution = new Solution();
$str = "()[]{}";
var_dump($solution->isValid($str));