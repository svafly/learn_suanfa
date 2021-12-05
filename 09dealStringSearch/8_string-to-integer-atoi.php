<?php
class Solution {

    /**
     * 字符串转换整数
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $n = strlen($s);
        $index=0;
        //处理空格
        while($index<$n && $s[$index]==" ")$index++;
        //处理正负数
        $sign = 1;
        if($index<$n && ($s[$index] == "-" || $s[$index]=="+")){
            $sign = $s[$index] == "-" ? -1 : 1;
            $index++;
        }
        //处理数字
        $val = 0;
        while($index<$n && ctype_digit($s[$index])) {
            //越界，$val*10 + ($s[$index]+0)>2147483647
            if($val > (2147483647-($s[$index]+0))/10){
                if($sign==1)return 2147483647;
                else return -2147483648;
            }
            $val = $val*10 + ($s[$index]+0);
            $index++;
        }
        return $sign * $val;
    }
}

//ctype_digit用了自带的函数判断是否是数字