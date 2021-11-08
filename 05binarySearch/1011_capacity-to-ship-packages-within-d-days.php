<?php
class Solution {

    /**
     * 在 D 天内送达包裹的能力
     * @param Integer[] $weights
     * @param Integer $days
     * @return Integer
     */
    function shipWithinDays($weights, $days) {
        $left = 0;
        $right = 0;
        foreach($weights as $weight){
            $left = max($left,$weight);
            $right += $weight;
        }
        while($left<$right){
            $mid = floor(($left+$right)/2);
            if($this->validate($weights,$mid)<=$days){
                $right = $mid;
            } else {
                $left = $mid+1;
            }
        }
        return $right;
    }

    function validate($weights,$target) {
        $day = 1;
        $total = 0;
        for($i=0;$i<count($weights);$i++){
            $total += $weights[$i];
            if($total>$target){
                $total = $weights[$i];
                $day++;
            }
        }
        return $day;
    }
}

//在最低载重和最大载重里通过二分，来找需要多少天，如果超过给定的天数，那么载重肯定太小，则淘汰