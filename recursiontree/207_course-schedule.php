<?php
class Solution {

    /**
     * 课程表
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        $to=[];
        //入度数组
        $indeg = array_fill(0,$numCourses,0);
        foreach($prerequisites as $prerequisite){
            $x = $prerequisite[0];
            $y  = $prerequisite[1];
            $to[$y][] = $x;
            $indeg[$x]++;
        }
        $q = new SplQueue();
        //拓扑排序第一步，从0入度出发
        for($i=0;$i<$numCourses;$i++){
            if($indeg[$i]==0)$q->push($i);
        }
        $lesson=[];
        while(!$q->isEmpty()){
            $x = $q->bottom();
            $q->shift();
            $lesson[] = $x;
            if (!isset($to[$x]))continue;
            foreach($to[$x] as $y){
                $indeg[$y]--;
                if($indeg[$y]==0)$q->push($y);

            }
        }
        print_r(count($lesson) == $numCourses);
        return count($lesson) == $numCourses;
    }
}
$solution = new Solution();
$numCourses = 2; $prerequisites = [[1,0]];
$solution->canFinish($numCourses,$prerequisites);