<?php
class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function strToInt($str) {
        $max = 2 ** 31 -1;
        $min = -2 ** 31;
        $bindary = floor((2 ** 31)/10);
        $str = trim($str);
        $len = strlen($str);
        if($len==0)return 0;
        $sign=1;
        $i=0;
        if($str[0]=="-")$sign=-1;
        if($str[0]=="-" || $str[0]=="+")$i++;

        $tmp = 0;
        for ($j=$i;$j<$len;$j++) {
            if (!ctype_digit($str[$j]))break;
            //这里其他语言可能会溢出
            if ($tmp>$bindary || $tmp==$bindary && $str[$j]>7){
                return $sign==1?$max:$min;
            }
            $tmp = $tmp*10 + $str[$j];
        }
//        $tmp = $tmp*$sign;
//        $tmp = $tmp>$max?$max:$tmp;
//        $tmp = $tmp<$min?$min:$tmp;
        return $tmp*$sign;
    }
}
$solution = new Solution();
$n = "-91283472332";
print_r($solution->strToInt($n));