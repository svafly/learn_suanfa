<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumberOfLIS($nums) {
        $n = count($nums);
        $dp = array_fill(0,$n,1);
        $g = array_fill(0,$n,1);
        for($i=1;$i<$n;$i++) {
            for($j=0;$j<$i;$j++) {
                if($nums[$j]<$nums[$i]){
                    if($dp[$i]<$dp[$j]+1) {
                        $dp[$i] = $dp[$j]+1;
                        $g[$i] = $g[$j];
                        echo "first";
                    } elseif ($dp[$i]==$dp[$j]+1) {
                        $dp[$i] = $dp[$j]+1;
                        $g[$i] += $g[$j];
                        echo "second";
                    }
                    print_r($g);
                    echo "i=".$i;
                    echo "\n";
                }
            }
        }
        $ans = 0;
        print_r($dp);
        $max = max($dp);
        for($i=0;$i<$n;$i++){
            if($max == $dp[$i])$ans += $g[$i];
        }
        return $ans;
    }
}

$solution = new Solution();
$a = [1,1,1,2,2,2,3,3,3];
print_r($solution->findNumberOfLIS($a));

//记录g的个数时，当相等，要累积前面的g[j];所以最后的记录是123，369