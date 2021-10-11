<?php
class Solution {

    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        $stack = new \SplStack();
        foreach ($tokens as $token) {
            if ($token == "+"||$token == "-"||$token == "*"||$token == "/"){
                $y = $stack->pop();
                $x = $stack->pop();
                $t = $this->cal($x,$y,$token);
                print_r($t);
                echo "\n";
                $stack->push($t);
            } else {
                $stack->push($token+0);
            }
        }
        return $stack->top();
    }

    function cal($x,$y,$op) {
        if ($op == "+")return $x+$y;
        if ($op == "-")return $x-$y;
        if ($op == "*")return $x*$y;
        if ($op == "/")return intval($x/$y);
        return 0;
    }
}

//遇到数字则入栈，遇到符号则取出数字计算，然后入栈，最后剩下的数字即为需要的答案。
$solution = new Solution();
$tokens = ["10","6","9","3","+","-11","*","/","*","17","+","5","+"];
var_dump($solution->evalRPN($tokens));