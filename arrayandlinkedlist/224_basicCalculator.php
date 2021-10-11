<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $result = 0;
        $len = strlen($s);
        $sigh = 1;
        $number = 0;
        $stack = new \SplStack();
        for ($i=0;$i<$len;$i++) {
            if (ctype_digit($s[$i])) {
                $number = 10*$number + ($s[$i]-0);
                print_r($number);
                echo "\n";
            } elseif ($s[$i] == "+") {
                $result += $sigh * $number;
                $number=0;
                $sigh=1;
            } elseif ($s[$i] == "-") {
                $result += $sigh * $number;
                $number = 0;
                $sigh = -1;
            } elseif ($s[$i] == "(") {
                $stack->push($result);
                $stack->push($sigh);
                $sigh=1;
                $result=0;
            } elseif ($s[$i] == ")") {
                $result += $sigh * $number;
                $number = 0;
                $result *= $stack->pop();    //stack.pop() is the sign before the parenthesis
                $result += $stack->pop();
            }

        }
        if ($number!=0)$result += $sigh * $number;
        return $result;
    }
}
$solution = new Solution();
//$s = "(1+(4+5+2)-3)+(6+8)";
$s = "1+(6-1)";
var_dump($solution->calculate($s));
//中缀转后缀
//维护两个栈，一个符号栈，一个数字栈，根据运算符优先级弹出到数字栈a