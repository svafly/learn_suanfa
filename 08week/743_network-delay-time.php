<?php
class Solution {

    /**
     * 网络延迟时间
     * @param Integer[][] $times
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function networkDelayTime($times, $n, $k) {
        //初始化每个节点为无穷大
        $dist = array_fill(0,$n+1,1e9);
        //起点
        $dist[$k] = 0;
        //反复循环，直到不更新
        for($i=0;$i<$n;$i++) {
            $flag = false;
            foreach($times as $time) {
                $x = $time[0];
                $y = $time[1];
                $z = $time[2];
                if ($dist[$x]+$z<$dist[$y]){
                    $dist[$y] = $dist[$x]+$z;
                    $flag=true;
                }
            }
            if(!$flag)break;
        }
        //返回最大值,这里节点从1开始
        $ans=0;
        for($i=1;$i<=$n;$i++) {
            $ans = max($ans,$dist[$i]);
        }
        return $ans == 1e9 ? -1 : $ans;
    }
}