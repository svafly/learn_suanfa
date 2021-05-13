<?php
class Solution {

    /**
     * @param String $address
     * @return String
     */
    function defangIPaddr($address) {
        $len  = strlen($address);
        $tmp = "";
        foreach (str_split($address) as $str) {
            $tmp .= $str == "." ? "[.]" : $str;
        }

        return $tmp;
    }
}
$solution = new Solution();
$address  = "1.1.1.1";
print_r($solution->defangIPaddr($address));