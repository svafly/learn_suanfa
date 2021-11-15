<?php
class Solution {

    /**
     * 不同路径ii
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {
        $m = count($obstacleGrid);
        $n = count($obstacleGrid[0]);
        $dp = array_fill(0,$m+1,array_fill(0,$n+1,0));
        $dp[0][1] = 1;
        for($i=1;$i<=$m;$i++){
            for($j=1;$j<=$n;$j++){
                if($obstacleGrid[$i-1][$j-1]==0){
                    $dp[$i][$j] = $dp[$i-1][$j]+$dp[$i][$j-1];
                }
            }
        }
        return $dp[$m][$n];
    }
}

//这里的$dp[0][1] = 1;是不是可以$dp[1][0] = 1;能达到同样的效果？