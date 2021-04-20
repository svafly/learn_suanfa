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

    function isValid2($s):bool {
        //用栈来匹配，如果匹配完全，则栈为空
        //这里有个很妙的哨兵，加入一个不存在的字符，这样可以不用判断栈是否为空，直接判断
        $eg = ["{"=>"}","["=>"]","("=>")","?"=>"?"];
        $stack = new \SplStack();
        $stack->push("?");
        for ($i=0;$i<strlen($s);$i++) {
            $tmp = $stack->top();
            if ($eg["$tmp"] == $s[$i]) {
                $stack->pop();
            } else {
                $stack->push($s[$i]);
            }
        }
        return $stack->count()==1;
    }
}

$solution = new Solution();
$str = "()[]{}";
var_dump($solution->isValid2($str));