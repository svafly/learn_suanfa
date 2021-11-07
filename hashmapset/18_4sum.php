<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        //先排序
        sort($nums);
        $ans=[];
        $n = count($nums);
        //确定第一个数
        for($i=0;$i<$n;$i++) {
            //去重
            if($i>0 && $nums[$i]==$nums[$i-1])continue;
            //确定第二个数
            for($j=$i+1;$j<$n;$j++){
                //去重
                if($j>$i+1 && $nums[$j]==$nums[$j-1])continue;
                $k = $j+1;
                $p = $n-1;
                while($k<$p){
                    //去重
                    while($k>$j+1 && $k<$n && $nums[$k]==$nums[$k-1])$k++;
                    if($k>=$p)break;
                    $sum = $nums[$i]+$nums[$j]+$nums[$k]+$nums[$p];
                    if($sum == $target){
                        $ans[] = [$nums[$i],$nums[$j],$nums[$k],$nums[$p]];
                        $k++;
                    } elseif($sum<$target){
                        $k++;
                    } elseif($sum>$target){
                        $p--;
                    }
                }
            }
        }
        return $ans;
    }
}