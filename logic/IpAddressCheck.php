<?php
//给定一个字符串表示的IP地址，例如：123.92.2.34,判断其是否合法，合法规则如下：
//a.除了空格、数字和.之外，不得包含其他字符
//b.IP地址由四个数字组成，每个数字由.隔开，每个.隔开的数字大小在0～255之间
//c.数字前后可以有空格，中间不可以有空格，比如"123 . 92.2 . 34"合法，"12 3 . 9 2.2 . 34"非法
//当然这个题目可以继续增加一些规则，比如每个数字不能有前导0，但可以为0，比如"021.3.02.34"非法，"0.2.0.33"合法
class Solution {
    /**
     * @param String $s
     * @return Boolean
     */
    function checkIpAdd(String $s):bool{
        //非空判断
        if ($s==null )return false;
        $add = explode(".",$s);
        //分段个数是否为4
        if (count($add) != 4)return false;
        //分段验证
        for ($i=0;$i<4;$i++) {
            $flag = $this->checkSingle($add[$i]);
            if (!$flag)return false;
        }
        return true;
    }
    function checkSingle($ip):bool {
        $ip = trim($ip);
        //数字范围
        if ($ip<0 || $ip>255)return false;

        //中间空格,或者非数字
        $tmp = str_split($ip);
        $n = count($tmp);
        $i=0;
        while ($i<$n) {
            if ($tmp[$i] == " "){
                return false;
            }
            if (!ctype_digit($tmp[$i])){
                return false;
            }
            $i++;
        }

        return true;
    }
}
$solution = new Solution();
//$ip_add = "123 . 92.2 . 34";
//$ip_add = " ";
//$ip_add = "233. . 33.2";
//$ip_add = "232. 232. 11";
//$ip_add = "2ba. 23. 32.11";
//$ip_add = " 222. 319. 2. 4";
//$ip_add = " 232. 22 1. 223. 1";
//$ip_add = " 222. 33. 13. 33";
$ip_add = "123.9.2.0";
print_r($solution->checkIpAdd($ip_add));