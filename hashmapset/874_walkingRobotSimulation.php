<?php
class Solution {

    /**
     * @param Integer[] $commands
     * @param Integer[][] $obstacles
     * @return Integer
     */
    function robotSim($commands, $obstacles) {
        $set = [];
        //这里Hashset用数组代替
        foreach ($obstacles as $obstacle) {
            $set[$obstacle[0]." ".$obstacle[1]] = null;
        }
        $dirs = [[0,1],[1,0],[0,-1],[-1,0]];      //北，东，南，西
        $result = 0;
        $d = 0;
        $x=0;$y=0;
        for($i=0;$i<count($commands);$i++) {
            if ($commands[$i] == -1) {
                //顺时针转方向，键值增1即可
                $d++;
                if ($d >= 4){
                    $d = 0;
                }
            } elseif ($commands[$i] == -2) {
                //反之逆时针转方向
                $d--;
                if ($d<0) {
                    $d = 3;
                }
            } else {
                while ($commands[$i]-- > 0 && !array_key_exists(($dirs[$d][0] + $x)." ".($dirs[$d][1] +$y),$set)) {
                    $x += $dirs[$d][0];
                    $y += $dirs[$d][1];
                }
                $result = max($result,$x*$x + $y*$y);
            }
        }
        return $result;
    }
}
$solution = new Solution();
$commands = [4,-1,4,-2,4];
$obstacles = [[2,4]];
var_dump($solution->robotSim($commands,$obstacles));