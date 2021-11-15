<?php
class Solution {

    /**
     * 最长公共子序列
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $m = strlen($text1);
        $n = strlen($text2);
        $text1 = " ".$text1;
        $text2 = " ".$text2;
        $dp = array_fill(0,$m+1,array_fill(0,$n+1,0));
        for($i=1;$i<=$m;$i++){
            for($j=1;$j<=$n;$j++){
                if($text1[$i] == $text2[$j]){
                    $dp[$i][$j] = $dp[$i-1][$j-1]+1;
                } else {
                    $dp[$i][$j] = max($dp[$i][$j-1],$dp[$i-1][$j]);
                }
            }
        }
        return $dp[$m][$n];
    }
}

//数组越界，可以初始化00为空字符串