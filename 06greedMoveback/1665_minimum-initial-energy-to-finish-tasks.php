<?php
class Solution {

    /**
     * 完成所有任务的最少初始能量
     * @param Integer[][] $tasks
     * @return Integer
     */
    function minimumEffort($tasks) {
        uasort($tasks,function($a,$b){
            return $a[0]-$a[1] < $b[0]-$b[1] ? 1 : -1;
        });
        $res=0;
        foreach($tasks as $task) {
            $res = max($res+$task[0],$task[1]);
        }
        return $res;
    }
}

//贪心，邻项交换，升序排列