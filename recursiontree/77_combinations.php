<?php
class Solution {

    private $res = [];
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $this->traceBack([],1,$n,$k);
        return $this->res;
    }

    function traceBack($chosen,$i,$n,$k) {
        if ($k == count($chosen)){
            echo "----选择i：".$i.";";
            echo implode(",", $chosen)."\n";
            $this->res[] = $chosen;
            return;
        }
        for ($j=$i;$j<=$n;$j++) {
            $chosen[] = $j;
            $this->traceBack($chosen,$j+1,$n,$k);
            array_pop($chosen);
            echo "回溯ij：".$i.$j.";";
            echo implode(",", $chosen)."\n";
        }
    }
}
//----选择i：3;1,2
//回溯ij：22;1
//----选择i：4;1,3
//回溯ij：23;1
//----选择i：5;1,4
//回溯ij：24;1
//回溯ij：11;
//----选择i：4;2,3
//回溯ij：33;2
//----选择i：5;2,4
//回溯ij：34;2
//回溯ij：12;
//----选择i：5;3,4
//回溯ij：44;3
//回溯ij：13;
//回溯ij：14;
$solution = new Solution();
print_r($solution->combine(4,2));