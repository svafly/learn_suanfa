<?php
class Solution {
    private $res = [];

    /**
     * 子集
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->trackback($nums,0,[]);
        return $this->res;
    }

    function trackback($nums,$i,$trace) {
        $this->res[] = $trace;
        echo "我是叶子：".$i.";";
        echo implode(",", $trace)."\n";
//        print_r($trace);
        echo PHP_EOL;
        for ($j=$i;$j<count($nums);$j++) {
            $trace[] = $nums[$j];
            echo "----选择j：".$j."-i:".$i.";";
            echo implode(",", $trace)."\n";
            echo PHP_EOL;
            $this->trackback($nums,$j+1,$trace);
            echo "选择j：".$j."-i:".$i.";";
            array_pop($trace);
            echo implode(",", $trace)."\n";
            echo PHP_EOL;
        }
    }
}

$solution = new Solution();
$nums = [1,2,3];
print_r($solution->subsets($nums));