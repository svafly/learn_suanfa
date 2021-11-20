<?php
class Solution {

    /**
     * 编辑距离
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        $n = strlen($word1);
        $m = strlen($word2);

        $dp = array_fill(0,$n+1,array_fill(0,$m+1,1e9));
        for ($i=0;$i<=$n;$i++)$dp[$i][0] = $i;
        for ($j=0;$j<=$m;$j++)$dp[0][$j] = $j;

        for($i=1;$i<=$n;$i++) {
            for($j=1;$j<=$m;$j++) {
                $dp[$i][$j] = min(min($dp[$i][$j-1],$dp[$i-1][$j])+1,$dp[$i-1][$j-1]+($word1[$i-1]!=$word2[$j-1]));
            }
        }
        return $dp[$n][$m];
    }
}

//删除、添加、替换