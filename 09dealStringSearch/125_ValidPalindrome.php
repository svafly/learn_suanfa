<?php
class Solution {

    //过滤字符串，只留字母和数字字符
    //反转字符
    //判断是否相等

    /**
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome2(String $s):bool {
        $str = $this->replaceStr($s);
        return $str == $this->reverseStr($str);
    }

    private function replaceStr($s):string {
         preg_match_all('/[A-Za-z0-9]+/',$s,$matches);
         return strtolower(implode('',$matches[0]));
    }

    private function reverseStr($s):string {
        return strrev($s);
    }

    /**
     * solution2
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome3(String $s):bool {
        $tmp="";
        //1.判断字母和数字的字符，取出来;2.两头比较是否相等
        //IntlChar在PHP7之后才增加
        //islower 是否小写字母
        //isdigit 是否数字
        //isupper 是否大写字母
        //isalpha 是否字母
        //isalnum 是否字母或数字
        //tolower 转小写
        //toupper 转大写
        //原来还有一个判断的函数就是，ctype_alpha,ctype_digit,这个(PHP 4 >= 4.0.4, PHP 5, PHP 7, PHP 8)
        foreach (str_split($s) as $value) {
            if (IntlChar::islower($value) || IntlChar::isdigit($value)) $tmp.= $value;
            if (IntlChar::isupper($value)) $tmp.= strtolower($value);
        }

        $i = 0;
        $j = strlen($tmp)-1;
        while ($i < $j) {
            if ($tmp[$i] != $tmp[$j]) return false;
            $i++;
            $j--;
        }
        return true;
    }

    public function isPalindrome(String $s):bool {
        $tmp="";
        //头尾指针比较
        foreach(str_split($s) as $value){
            if(ctype_lower($value)||ctype_digit($value))$tmp.=$value;
            if(ctype_upper($value))$tmp.=strtolower($value);
        }
        $i=0;
        $j=strlen($tmp)-1;
        while($i<$j) {
            if($tmp[$i]!=$tmp[$j]) return false;
            $i++;
            $j--;
        }
        return true;
    }
}

$class1 = new Solution();
var_dump($class1->isPalindrome2("A man, a plan, a canal: Panama"));
var_dump($class1->isPalindrome("A man, a plan, a canal: Panama"));
var_dump($class1->isPalindrome2("race a car"));
var_dump($class1->isPalindrome("race a car"));
var_dump($class1->isPalindrome3("race a car"));
